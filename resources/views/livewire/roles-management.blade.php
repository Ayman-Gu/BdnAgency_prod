<div>
    <div class="container py-4">
        <h1>Gestion des Rôles</h1>

        @if(session()->has('success'))
            <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger mb-3">{{ session('error') }}</div>
        @endif

        <div class="mb-3">
            <button wire:click="create" class="btn btn-primary">Créer un nouveau rôle</button>
        </div>

        {{-- Role Creation/Editing Form --}}
        @if($showForm)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $isEditing ? 'Modifier le rôle' : 'Créer un nouveau rôle' }}
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du rôle (unique)</label>
                            <input type="text" id="name" wire:model.live="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="display_name" class="form-label">Nom d'affichage (Optionnel)</label>
                            <input type="text" id="display_name" wire:model.live="display_name" class="form-control @error('display_name') is-invalid @enderror">
                            @error('display_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-success">
                            {{ $isEditing ? 'Mettre à jour' : 'Sauvegarder' }}
                        </button>
                        <button type="button" wire:click="cancel" class="btn btn-secondary ms-2">Annuler</button>
                    </form>
                </div>
            </div>
        @endif

        {{-- Roles List Table --}}
        <div class="card">
            <div class="card-header">
                Liste des Rôles
            </div>
            <div class="card-body">
                @if($roles->isEmpty())
                    <p>Aucun rôle n'a été trouvé.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Nom d'affichage</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr wire:key="role-{{ $role->id }}">
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name ?? 'N/A' }}</td>
                                        <td>
                                            <button wire:click="edit({{ $role->id }})" class="btn btn-sm btn-info me-2">Modifier</button>
                                            <button wire:click="delete({{ $role->id }})" wire:confirm="Êtes-vous sûr de vouloir supprimer ce rôle ?" class="btn btn-sm btn-danger">Supprimer</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
