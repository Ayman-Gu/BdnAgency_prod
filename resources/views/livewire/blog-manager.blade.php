<div>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    
    <!-- Ajouter une nouvelle catégorie -->
    <div class="row mb-3 mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    @can('manageCategories', App\Models\Blog::class)
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
                    @endcan

                </div>
            </div>
        </div>
    </div>
    
    <!-- Formulaire principal -->
    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
        <div class="row d-flex">
            <!-- Carte de gauche -->
            <div class="col-md-6 mb-3 d-flex">
                <div class="card shadow-sm flex-fill">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Infos du blog</h5>
                        <div class="mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" wire:model="title" class="form-control">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Catégorie</label>
                            <select wire:model="blog_category_id" class="form-select" required>
                                <option value="">-- Choisir --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Carte droite -->
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
                            <label class="form-label">Texte alternatif de l'image (SEO)</label>
                            <input type="text" wire:model="image_alt" class="form-control">
                            @error('image_alt') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Titre de l'image (SEO)</label>
                            <input type="text" wire:model="image_title" class="form-control">
                            @error('image_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Mots-clés (SEO)</label>
                            <input type="text" wire:model="meta_keywords" class="form-control">
                            @error('meta_keywords') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Méta-description</label>
                            <textarea wire:model="meta_description" class="form-control"></textarea>
                            @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Carte description pleine largeur -->
        <div class="col-12 mb-3">
            <div class="card shadow-sm w-100">
                <div class="card-body" wire:ignore>
                    <h5 class="card-title mb-3">Description</h5>
                    <input id="description_input" type="hidden" name="description" wire:model="description">
                    <trix-editor id="trix-editor" input="description_input"></trix-editor>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    
        <!-- Carte statut -->
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
    
        <!-- Boutons -->
        <div class="d-flex">

            @can('create', App\Models\Blog::class)
            <button type="submit" class="btn btn-primary">
                {{ $editMode ? 'Mettre à jour' : 'Créer' }}
            </button>
            @endcan

            @if($editMode)
                <button type="button" wire:click="resetForm" class="btn btn-secondary ms-2">
                    Annuler
                </button>
            @endif
        </div>
    </form>

<hr>
    <!-- Tableau des blogs -->
    <h4>Tous les blogs</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover table-borderless shadow-sm mt-3 rounded-full">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Créé le</th>
                    <th scope="col">Statut</th>
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
                        <td><span class="badge bg-info">{{ $blog->category?->name }}</span></td>
                        <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                        <td>
                            <span class="badge {{ $blog->status === 'published' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $blog->status === 'published' ? 'Publié' : 'En attente' }}
                            </span>
                        </td>
                        <td>
                            @can('update', App\Models\Blog::class)

                            <button class="btn btn-sm btn-outline-success me-1" wire:click="edit({{ $blog->id }})">
                                <i class="bi bi-pen-fill"></i>
                            </button>
                            @endcan
                            @can('delete', App\Models\Blog::class)

                            <button class="btn btn-sm btn-outline-danger" wire:click="delete({{ $blog->id }})" onclick="return confirm('Supprimer ?')">
                                <i class="bi bi-trash3"></i>
                            </button>
                            @endcan

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Veuillez ajouter votre blog</td>
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

   <!-- Tableau des catégories -->
    <h4>Toutes les catégories</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover table-borderless shadow-sm rounded mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
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

                                @can('manageCategories', App\Models\Blog::class)
                                <button wire:click="editCategory({{ $category->id }})" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pen-fill"></i>
                                </button>
                                <button wire:click="deleteCategory({{ $category->id }})" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer ?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                                @endcan

                            @endif
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
    <style>
        trix-editor {
    display: block;
    min-height: 400px;
    max-height: 400px;
    overflow-y: auto;
    padding: 15px;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    background-color: #fff;
    }
    </style>

</div>

<script>
    function bindTrixWithLivewire() {
        const trixEditor = document.querySelector('trix-editor');
        const trixInput = document.getElementById('description_input');
        if (!trixEditor || !trixInput) return;

        // Remove previous listener to avoid duplicates
        if (trixEditor._livewireTrixChange) {
            trixEditor.removeEventListener('trix-change', trixEditor._livewireTrixChange);
        }

        // Sync Trix changes to Livewire
        trixEditor._livewireTrixChange = function () {
            const livewireId = trixInput.closest('[wire\\:id]')?.getAttribute('wire:id');
            if (livewireId) {
                window.Livewire.find(livewireId).set('description', trixInput.value);
            }
        };
        trixEditor.addEventListener('trix-change', trixEditor._livewireTrixChange);

        // Listen for Livewire event to load content into Trix editor
        Livewire.on('loadDescription', description => {
            let safeDescription = '';
            if (typeof description === 'string') {
                safeDescription = description;
            } else if (description) {
                safeDescription = String(description);
            }
            trixInput.value = safeDescription;
            trixEditor.editor.loadHTML(safeDescription);
        });
    }

    document.addEventListener('livewire:init', () => {
        bindTrixWithLivewire();

        Livewire.hook('afterDomUpdate', () => {
            bindTrixWithLivewire();
        });
    });
    
</script>
