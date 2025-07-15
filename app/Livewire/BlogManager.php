<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogManager extends Component
{
    use WithFileUploads, WithPagination;

    public $title, $description, $image, $blog_id;
    public $image_alt, $image_title, $meta_keywords, $meta_description;
    public $status = 'pending';

    public $blog_category_id; 
    public $categories = [];  
    public $newCategory;

    public $editCategoryId = null;
    public $editCategoryName = null;

    public $editMode = false;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->categories = BlogCategory::orderBy('name')->get();

        $blogs = Blog::with('category')->latest()->paginate(5);
        return view('livewire.blog-manager', compact('blogs'));
    }

    public function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->blog_category_id = '';
        $this->status = 'pending';
        $this->image_alt = '';
        $this->image_title = '';
        $this->meta_keywords = '';
        $this->meta_description = '';
        $this->editMode = false;
        $this->blog_id = null;
    }

    public function addCategory()
    {
        $this->validate([
            'newCategory' => 'required|string|max:255|unique:blog_categories,name',
        ]);

        BlogCategory::create(['name' => $this->newCategory]);
        $this->newCategory = '';
        session()->flash('message', 'Category added successfully.');
    }

    public function store()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'image' => 'required|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'status' => 'required|in:pending,published',
            'image_alt' => 'nullable|string|max:255',
            'image_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $validated['image'] = $this->image->store('blogs', 'public');
        $validated['category'] = BlogCategory::find($this->blog_category_id)->name;

        Blog::create($validated);

        $this->resetForm();
        session()->flash('message', 'Blog Created Successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $this->blog_id = $id;
        $this->title = $blog->title;
        $this->description = $blog->description;
        $this->status = $blog->status;
        $this->image_alt = $blog->image_alt;
        $this->image_title = $blog->image_title;
        $this->meta_keywords = $blog->meta_keywords;
        $this->meta_description = $blog->meta_description;
        $this->blog_category_id = $blog->blog_category_id;

        $this->editMode = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'status' => 'required|in:pending,published',
            'image_alt' => 'nullable|string|max:255',
            'image_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $blog = Blog::findOrFail($this->blog_id);

        if ($this->image) {
            $validated['image'] = $this->image->store('blogs', 'public');
        }

        $validated['category'] = BlogCategory::find($this->blog_category_id)->name;

        $blog->update($validated);

        $this->resetForm();
        session()->flash('message', 'Blog Updated Successfully.');
    }

    public function delete($id)
    {
        Blog::destroy($id);
        session()->flash('message', 'Blog Deleted Successfully.');
    }

    public function editCategory($id)
    {
        $category = BlogCategory::findOrFail($id);
        $this->editCategoryId = $category->id;
        $this->editCategoryName = $category->name;
    }

    // Update category
    public function updateCategory()
    {
        $this->validate([
            'editCategoryName' => 'required|string|max:255|unique:blog_categories,name,' . $this->editCategoryId,
        ]);

        $category = BlogCategory::findOrFail($this->editCategoryId);
        $category->update(['name' => $this->editCategoryName]);

        $this->editCategoryId = null;
        $this->editCategoryName = null;
        session()->flash('message', 'Category updated successfully.');
    }

    // Delete category
    public function deleteCategory($id)
    {
        BlogCategory::destroy($id);
        session()->flash('message', 'Category deleted successfully.');
    }
}
