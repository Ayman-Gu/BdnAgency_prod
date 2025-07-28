<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\ProjectCategory;

class ProjectDisplay extends Component
{
    public $filter = 'all';
    public $perPage = 3;

    public function setFilter($category)
    {
        $this->filter = (string) $category;
        $this->perPage = 3; 
    }

    public function loadMore()
    {
        $this->perPage += 3;
    }

    public function render()
    {
        $query = Project::with('category')->where('status', 'published');

        if ($this->filter !== 'all') {
            $query->where('project_category_id', $this->filter);
        }

        // Get total count of filtered projects
        $totalProjects = $query->count();

        // Get limited projects by perPage
        $projects = $query->latest()->take($this->perPage)->get();

        $categories = ProjectCategory::orderBy('name')->get();

        return view('livewire.project-display', compact('projects', 'categories', 'totalProjects'));
    }
}
