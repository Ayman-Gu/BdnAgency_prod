<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BlogManager extends Component
{
    use AuthorizesRequests,WithFileUploads, WithPagination;

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

    public function mount()
    {
        // Enforce view permission
        $this->authorize('viewAny', Blog::class);
    }

    public function addCategory()
    {
        $this->authorize('manageCategories', Blog::class);

        $this->validate([
            'newCategory' => 'required|string|max:255|unique:blog_categories,name',
        ]);

        BlogCategory::create(['name' => $this->newCategory]);
        $this->newCategory = '';
        session()->flash('message', 'Category added successfully.');
    }

    public function store()
    {
        $this->authorize('create', Blog::class);

        $this->validate([
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

       $imagePath = $this->image->store('blogs', 'public');

        Blog::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title) . '-' . uniqid(),
            'description' => $this->description,
            'blog_category_id' => $this->blog_category_id,
            'image' => $imagePath,
            'image_alt' => $this->image_alt,
            'image_title' => $this->image_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'status' => $this->status,
        ]);

        $this->resetForm();
        $this->dispatch('loadDescription', '');
        session()->flash('message', 'Blog Created Successfully.');
    }

    public function edit($id)
    {
        $this->authorize('update', Blog::class);

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

        $this->dispatch('loadDescription', $blog->description);

    }

    public function update()
    {
        $this->authorize('update', Blog::class);

        $this->validate([
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
    
        $blog->title = $this->title;
        $blog->slug = Str::slug($this->title) . '-' . $blog->id;
        $blog->description = $this->description;
        $blog->blog_category_id = $this->blog_category_id;
        $blog->image_alt = $this->image_alt;
        $blog->image_title = $this->image_title;
        $blog->meta_keywords = $this->meta_keywords;
        $blog->meta_description = $this->meta_description;
        $blog->status = $this->status;
    
        if ($this->image) {
            $imagePath = $this->image->store('blogs', 'public');
            $blog->image = $imagePath;
        }
    
        $blog->save();

        $this->resetForm();
        $this->dispatch('loadDescription', '');
        session()->flash('message', 'Blog Updated Successfully.');

    }

    public function delete($id)
    {
        $this->authorize('delete', Blog::class);

        Blog::destroy($id);
        session()->flash('message', 'Blog Deleted Successfully.');
    }

    public function editCategory($id)
    {
        $this->authorize('manageCategories', Blog::class);

        $category = BlogCategory::findOrFail($id);
        $this->editCategoryId = $category->id;
        $this->editCategoryName = $category->name;
    }

    // Update category
    public function updateCategory()
    {
        $this->authorize('manageCategories', Blog::class);

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
        $this->authorize('manageCategories', Blog::class);

        BlogCategory::destroy($id);
        session()->flash('message', 'Category deleted successfully.');
    }
}
