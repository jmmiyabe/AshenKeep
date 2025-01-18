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
        $requirements = Requirement::all();
        return view('applicant_requirements', compact('requirements'));
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
}