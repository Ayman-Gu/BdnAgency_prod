<div class="container-fluid px-2 px-md-4">
    @if(session()->has('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif

    {{-- Ajouter une nouvelle catégorie --}}
    @can('manageCategories', \App\Models\Project::class)
    <div class="row mb-3 mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Ajouter une nouvelle catégorie</h6>
                    <form wire:submit.prevent="addCategory" class="row g-2">
                        <div class="col-md-10">
                            <input type="text" wire:model="newCategory" class="form-control" placeholder="Nom de la catégorie">
                            @error('newCategory') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-2 d-grid">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan

    {{-- Formulaire de création/mise à jour de projet --}}
    @canany(['create', 'update'], \App\Models\Project::class)
    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
        <div class="row">
            {{-- Infos du projet --}}
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Infos du projet</h5>

                        <div class="mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" wire:model="title" class="form-control">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea wire:model="description" class="form-control"></textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Catégorie</label>
                            <select wire:model="project_category_id" class="form-select" required>
                                <option value="">-- Choisir --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('project_category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Image & SEO --}}
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Image & SEO</h5>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" wire:model="image" class="form-control">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Texte alternatif de l'image (SEO)</label>
                            <input type="text" wire:model="image_alt" class="form-control">
                            @error('image_alt') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Titre de l'image (SEO)</label>
                            <input type="text" wire:model="image_title" class="form-control">
                            @error('image_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statut --}}
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h6 class="card-title mb-3">Statut</h6>
                <select wire:model="status" class="form-select">
                    <option value="pending">En attente</option>
                    <option value="published">Publié</option>
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Boutons de soumission --}}
        <div class="d-flex flex-column flex-md-row gap-2 mb-4">
            <button type="submit" class="btn btn-primary">
                {{ $editMode ? 'Mettre à jour' : 'Créer' }}
            </button>
            @if($editMode)
                <button type="button" wire:click="resetForm" class="btn btn-secondary">
                    Annuler
                </button>
            @endif
        </div>
    </form>
    @endcanany

    <hr>

    {{-- Tableau des projets --}}
    <h4 class="mt-4">Tous les projets</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover table-borderless shadow-sm mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Date de création</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $project->image) }}" width="80" height="80" class="rounded border" alt="">
                        </td>
                        <td class="fw-semibold">{{ $project->title }}</td>
                        <td>{{ Str::limit($project->description, 50) }}</td>
                        <td>
                            <span class="badge bg-info ">{{ $project->category?->name }}</span>
                        </td>
                        <td>{{ $project->created_at->format('Y-m-d') }}</td>
                        <td>
                            <span class="badge {{ $project->status === 'published' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </td>
                        <td>
                            @can('update', \App\Models\Project::class)
                                <button class="btn btn-sm btn-outline-success me-1" wire:click="edit({{ $project->id }})">
                                    <i class="bi bi-pen-fill"></i>
                                </button>
                            @endcan

                            @can('delete', \App\Models\Project::class)
                                <button class="btn btn-sm btn-outline-danger" wire:click="delete({{ $project->id }})" onclick="return confirm('Supprimer ?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Veuillez ajouter votre projet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center my-4">
        {{ $projects->links() }}
    </div>

    <hr>

    {{-- Tableau des catégories --}}
    <h4 class="mt-4">Toutes les catégories</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover table-borderless shadow-sm mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th width="160">Actions</th>
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
                            @can('manageCategories', \App\Models\Project::class)
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
                                    <button wire:click="deleteCategory({{ $category->id }})" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer ?')">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center py-4">Aucune catégorie trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
