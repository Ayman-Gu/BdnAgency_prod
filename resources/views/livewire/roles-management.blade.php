<div class="container mt-5">

    @can('create', App\Models\Role::class)
        <button wire:click="create" class="btn btn-primary mb-3">Ajouter un rôle</button>
    @endcan

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($showForm)
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">{{ $isEditing ? 'Modifier le rôle' : 'Créer un nouveau rôle' }}</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                    <div class="mb-3">
                        <label class="form-label">Nom du rôle *</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nom d’affichage</label>
                        <input type="text" class="form-control" wire:model="display_name">
                        @error('display_name') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            {{ $isEditing ? 'Mettre à jour' : 'Enregistrer' }}
                        </button>
                        <button type="button" wire:click="cancel" class="btn btn-outline-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Liste des rôles</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Nom d’affichage</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name ?? '-' }}</td>
                            <td class="text-end">
                                @can('update', App\Models\Role::class)
                                    <button wire:click="edit({{ $role->id }})" class="btn btn-sm btn-outline-warning me-2">
                                        Modifier
                                    </button>
                                @endcan
                                @can('delete', App\Models\Role::class)
                                    <button wire:click="delete({{ $role->id }})"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Supprimer ce rôle ?')">
                                        Supprimer
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">Aucun rôle trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
