<div>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

           
    <!-- Add New Category -->
    <div class="row mb-3 mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Add New Category</h6>
                    <form wire:submit.prevent="addCategory" class="row g-2">
                        <div class="col-md-10">
                            <input type="text" wire:model="newCategory" class="form-control" placeholder="Category name">
                            @error('newCategory') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-2 d-grid">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
        <div class="row d-flex">
            <!-- Left Card -->
            <div class="col-md-6 mb-3 d-flex">
                <div class="card shadow-sm flex-fill">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Blog Info</h5>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" wire:model="title" class="form-control">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea wire:model="description" class="form-control"></textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                           <select wire:model="blog_category_id" class="form-select" required>
                                <option value="">-- Choose --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>

     
        <!--  Card -->
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Image & SEO</h5>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" wire:model="image" class="form-control">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image Alt (SEO)</label>
                            <input type="text" wire:model="image_alt" class="form-control">
                            @error('image_alt') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image Title (SEO)</label>
                            <input type="text" wire:model="image_title" class="form-control">
                            @error('image_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" wire:model="meta_keywords" class="form-control">
                            @error('meta_keywords') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea wire:model="meta_description" class="form-control"></textarea>
                            @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Status Small Card -->
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h6 class="card-title mb-3">Status</h6>
                <select wire:model="status" class="form-select">
                    <option value="pending">Pending</option>
                    <option value="published">Published</option>
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex">
            <button type="submit" class="btn btn-primary">
                {{ $editMode ? 'Update' : 'Create' }}
            </button>
            @if($editMode)
                <button type="button" wire:click="resetForm" class="btn btn-secondary ms-2">
                    Cancel
                </button>
            @endif
        </div>
    </form>

    <hr>

    <!-- Blogs Table -->
    <h4>All Blogs</h4>
   <div class="table-responsive">
    <table class="table align-middle table-hover table-bordered shadow-sm rounded mt-3">
        <thead class="table-dark">
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $blog->image) }}" width="80" height="80" class="rounded border" alt="">
                    </td>
                    <td class="fw-semibold">{{ $blog->title }}</td>
                    <td>{{ Str::limit($blog->description, 50) }}</td>
                    <td><span class="badge bg-info text-dark">{{ $blog->category?->name }}</span></td>
                    <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                    <td>
                        <span class="badge {{ $blog->status === 'published' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-success me-1" wire:click="edit({{ $blog->id }})">
                            <i class="bi bi-pen-fill"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" wire:click="delete({{ $blog->id }})" onclick="return confirm('Delete?')">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Please Add your blog</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
    
    <hr>

   <!-- Categories Table -->
    <h4>All Categories</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover table-bordered shadow-sm rounded mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th width="160">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>
                            @if($editCategoryId === $category->id)
                                <input type="text" wire:model="editCategoryName" class="form-control form-control-sm">
                                @error('editCategoryName') <small class="text-danger">{{ $message }}</small> @enderror
                            @else
                                {{ $category->name }}
                            @endif
                        </td>
                        <td>
                            @if($editCategoryId === $category->id)
                                <button wire:click="updateCategory" class="btn btn-sm btn-success me-1">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                                <button wire:click="$set('editCategoryId', null)" class="btn btn-sm btn-secondary">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            @else
                                <button wire:click="editCategory({{ $category->id }})" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pen-fill"></i>
                                </button>
                                <button wire:click="deleteCategory({{ $category->id }})" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center py-4">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    

</div>



