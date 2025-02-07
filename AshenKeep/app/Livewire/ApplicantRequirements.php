<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Requirement;

class ApplicantRequirements extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind'; // Ensure Tailwind pagination is applied

    public function render()
    {
        // Paginate first, then use collections in the Blade view
        $groupedRequirements = Requirement::paginate(10);

        return view('livewire.applicant-requirements', [
            'groupedRequirements' => $groupedRequirements,
        ]);
    }
}
