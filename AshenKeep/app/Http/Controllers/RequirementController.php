<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RequirementController extends Controller
{
    /**
     * Submit requirements and store in the database.
     */
    public function index()
    {
         // Group requirements by applicant name
        $groupedRequirements = Requirement::all()->groupBy('name');

        return view('applicant_requirements', compact('groupedRequirements'));
    }

    /**
     * Handle file upload and store in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'requirement_type' => 'required|string',
            'files' => 'required|array|max:5', // Maximum 5 files
            'files.*' => 'file|mimes:jpeg,png,gif,pdf,doc,docx|max:5120', // 5MB max per file
        ]);

        // Upload files and store their paths
        $filePaths = [];
        foreach ($request->file('files') as $file) {
            $filePaths[] = $file->store('requirements', 'public');
        }

        // Save to the database
        Requirement::create([
            'name' => $request->name,
            'requirement_type' => $request->requirement_type,
            'files' => $filePaths,
            'status' => 'pending',
        ]);

        return redirect()->route('applicant_requirements')->with('success', 'Requirement submitted successfully.');
    }

    //Display submitted requirements for Officestaff
    public function viewOfficeRequirements()
    {
        // Group requirements by applicant name
        $groupedRequirements = Requirement::where('status', 'pending')
        ->get()
        ->groupBy('name');

        return view('officestaff_requirements', compact('groupedRequirements'));
    }

    //Update status of a requirements
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $requirement = Requirement::findOrFail($id);
        $requirement->update(['status' => $request->status]);

        return redirect()->route('officestaff_requirements')->with('success', 'Requirement status updated successfully.');
    }

    public function batchUpdateStatus(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|in:approved,rejected',
        ]);

        // Update all requirements for the specified applicant
        Requirement::where('name', $request->name)
            ->where('status', 'pending')
            ->update(['status' => $request->status]);

        return redirect()->route('officestaff_requirements')
            ->with('success', "All requirements for {$request->name} have been {$request->status}.");
    }
}