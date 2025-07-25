<div class="container py-4">

    @if(session()->has('success'))
        <div class="alert alert-success mb-3" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{ session('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger mb-3" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{ session('error') }}
        </div>
    @endif

    @can('update', \App\Models\Permission::class)
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h4 mb-0">Attribuer des permissions à un rôle</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="role-select" class="form-label">Sélectionner un rôle</label>
                <select id="role-select" wire:model.live="selectedRoleId" class="form-select">
                    <option value="">-- Choisissez un rôle --</option>
                    @foreach($this->roles as $role)
                        <option value="{{ $role->id }}">{{ $role->display_name ?? $role->name }}</option>
                    @endforeach
                </select>
            </div>

            @if($selectedRoleId)
                <button wire:click="saveRolePermissions" class="btn btn-primary mt-3">Enregistrer les permissions du rôle</button>
            @endif
        </div>
    </div>
    @endcan

    @can('viewAny', \App\Models\Permission::class)
    @if($selectedRoleId)
        <h3 class="mt-4">Permissions disponibles</h3>
        @foreach($this->permissions as $group => $perms)
            <div class="card mb-3" wire:key="group-{{ $group }}">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>{{ ucfirst(str_replace('_', ' ', $group)) }}</strong>
                    <div class="form-check form-switch">
                        <input type="checkbox" id="select-all-{{ $group }}" class="form-check-input"
                               wire:model.live="groupSelectAll.{{ $group }}">
                        <label for="select-all-{{ $group }}" class="form-check-label">Tout sélectionner</label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($perms as $permission)
                            <div class="col-md-4 col-sm-6 mb-2" wire:key="permission-{{ $permission->id }}">
                                <div class="d-flex justify-content-between align-items-center p-2 rounded" style="background-color: #f8f9fa;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               wire:model.live="selectedPermissions"
                                               value="{{ $permission->id }}"
                                               id="perm-{{ $permission->id }}">
                                        <label class="form-check-label" for="perm-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @can('update', \App\Models\Permission::class)
                                    <div class="btn-group">
                                        <button wire:click="editPermission({{ $permission->id }})" class="btn btn-sm btn-outline-secondary" title="Modifier">
                                            <i class="bi bi-pen-fill"></i>
                                        </button>
                                        @can('delete', \App\Models\Permission::class)
                                        <button wire:click="deletePermission({{ $permission->id }})" 
                                                wire:confirm="Êtes-vous sûr de vouloir supprimer la permission '{{ $permission->name }}' ? Cette action est irréversible."
                                                class="btn btn-sm btn-outline-danger" title="Supprimer">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                        @endcan
                                    </div>
                                    @endcan
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    @endcan

    @canany(['create', 'update'], \App\Models\Permission::class)
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="h4 mb-0">{{ $editingPermissionId ? 'Modifier la permission' : 'Créer une nouvelle permission' }}</h2>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $editingPermissionId ? 'updatePermission' : 'createPermission' }}">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="{{ $editingPermissionId ? 'editingPermissionName' : 'newPermissionName' }}" class="form-label">Nom de la permission</label>
                        <input type="text" class="form-control @error($editingPermissionId ? 'editingPermissionName' : 'newPermissionName') is-invalid @enderror"
                               id="{{ $editingPermissionId ? 'editingPermissionName' : 'newPermissionName' }}"
                               wire:model.lazy="{{ $editingPermissionId ? 'editingPermissionName' : 'newPermissionName' }}"
                               placeholder="ex: Créer des articles">
                        @error($editingPermissionId ? 'editingPermissionName' : 'newPermissionName') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="{{ $editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey' }}" class="form-label">Clé de permission</label>
                        <input type="text" class="form-control @error($editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey') is-invalid @enderror"
                               id="{{ $editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey' }}"
                               wire:model.lazy="{{ $editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey' }}"
                               placeholder="ex: posts.create">
                        @error($editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="{{ $editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName' }}" class="form-label">Nom du groupe (table)</label>
                        <input type="text" class="form-control @error($editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName') is-invalid @enderror"
                               id="{{ $editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName' }}"
                               wire:model.lazy="{{ $editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName' }}"
                               placeholder="ex: gestion_articles">
                        @error($editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-2 d-flex align-items-end mb-3">
                        @if($editingPermissionId)
                            <button type="submit" class="btn btn-success w-100">Mettre à jour</button>
                            <button wire:click="cancelEdit" type="button" class="btn btn-secondary w-100 ms-2">Annuler</button>
                        @else
                            <button type="submit" class="btn btn-primary w-100">Créer</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endcanany

</div>
