<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\ProjectCategory;

class ProjectDisplay extends Component
{

    public $filter = 'all';

    public function setFilter($category)
    {
        $this->filter = (string) $category;
    }

    public function render()
    {
        $query = Project::with('category')->where('status', 'published');
    
        if ($this->filter !== 'all') {
            $query->where('project_category_id', $this->filter);
        }
    
        $projects = $query->latest()->get();
        $categories = ProjectCategory::orderBy('name')->get();
    
        return view('livewire.project-display', compact('projects', 'categories'));
    }
    


}
