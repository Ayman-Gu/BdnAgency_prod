<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Project;
use App\Models\ProjectCategory;

class ProjectManager extends Component
{
    use WithFileUploads, WithPagination;

    public $title, $description, $image, $project_id;
    public $image_alt, $image_title, $meta_keywords, $meta_description;
    public $status = 'pending';

    public $project_category_id;
    public $categories = [];
    public $newCategory;

    public $editCategoryId = null;
    public $editCategoryName = null;

    public $editMode = false;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->categories = ProjectCategory::orderBy('name')->get();
        $projects = Project::with('category')->latest()->paginate(5);

        return view('livewire.project-manager', compact('projects'));
    }
     public function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->project_category_id = '';
        $this->status = 'pending';
        $this->image_alt = '';
        $this->image_title = '';
        $this->editMode = false;
        $this->project_id = null;
    }
     public function addCategory()
    {
        $this->validate([
            'newCategory' => 'required|string|max:255|unique:project_categories,name',
        ]);

        ProjectCategory::create(['name' => $this->newCategory]);
        $this->newCategory = '';
        session()->flash('message', 'Category added successfully.');
    }

     public function store()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'project_category_id' => 'required|exists:project_categories,id',
            'image' => 'required|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'status' => 'required|in:pending,published',
            'image_alt' => 'nullable|string|max:255',
            'image_title' => 'nullable|string|max:255',
        ]);

        $validated['image'] = $this->image->store('projects', 'public');

        Project::create($validated);

        $this->resetForm();
        session()->flash('message', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->project_id = $id;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->status = $project->status;
        $this->image_alt = $project->image_alt;
        $this->image_title = $project->image_title;
        $this->project_category_id = $project->project_category_id;

        $this->editMode = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'project_category_id' => 'required|exists:project_categories,id',
            'status' => 'required|in:pending,published',
            'image_alt' => 'nullable|string|max:255',
            'image_title' => 'nullable|string|max:255',
        ]);

        $project = Project::findOrFail($this->project_id);

        if ($this->image) {
            $validated['image'] = $this->image->store('projects', 'public');
        }

        $project->update($validated);

        $this->resetForm();
        session()->flash('message', 'Project updated successfully.');
    }
     public function delete($id)
    {
        Project::destroy($id);
        session()->flash('message', 'Project deleted successfully.');
    }
    public function editCategory($id)
    {
        $category = ProjectCategory::findOrFail($id);
        $this->editCategoryId = $category->id;
        $this->editCategoryName = $category->name;
    }

    public function updateCategory()
    {
        $this->validate([
            'editCategoryName' => 'required|string|max:255|unique:project_categories,name,' . $this->editCategoryId,
        ]);

        $category = ProjectCategory::findOrFail($this->editCategoryId);
        $category->update(['name' => $this->editCategoryName]);

        $this->editCategoryId = null;
        $this->editCategoryName = null;
        session()->flash('message', 'Category updated successfully.');
    }

    public function deleteCategory($id)
    {
        ProjectCategory::destroy($id);
        session()->flash('message', 'Category deleted successfully.');
    }
}
