<div class="container py-4">

    {{-- Session messages for user feedback --}}
    @if(session()->has('success'))
        <div class="alert alert-success mb-3" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{ session('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger mb-3" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{ session('error') }}</div>
    @endif

    <!-- Section 1: Assign Permissions to Role -->
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h4 mb-0">Assign Permissions to a Role</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="role-select" class="form-label">Select a Role</label>
                <select id="role-select" wire:model.live="selectedRoleId" class="form-select">
                    <option value="">-- Choose a Role --</option>
                    @foreach($this->roles as $role)
                        <option value="{{ $role->id }}">{{ $role->display_name ?? $role->name }}</option>
                    @endforeach
                </select>
            </div>

            @if($selectedRoleId)
                <button wire:click="saveRolePermissions" class="btn btn-primary mt-3">Save Permissions for Role</button>
            @endif
        </div>
    </div>

    <!-- Section 2: Permissions List (with CRUD actions) -->
    @if($selectedRoleId)
        <h3 class="mt-4">Available Permissions</h3>
        @foreach($this->permissions as $group => $perms)
            <div class="card mb-3" wire:key="group-{{ $group }}">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>{{ ucfirst(str_replace('_', ' ', $group)) }}</strong>
                    <div class="form-check form-switch">
                        <input type="checkbox" id="select-all-{{ $group }}" class="form-check-input"
                               wire:model.live="groupSelectAll.{{ $group }}">
                        <label for="select-all-{{ $group }}" class="form-check-label">Select All</label>
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
                                    <div class="btn-group">
                                        <button wire:click="editPermission({{ $permission->id }})" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="bi bi-pen-fill"></i>
                                        </button>
                                        <button wire:click="deletePermission({{ $permission->id }})" 
                                                wire:confirm="Are you sure you want to delete the '{{ $permission->name }}' permission? This cannot be undone."
                                                class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    @endif

   <!-- Section 3: Create / Edit Permission Form -->
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="h4 mb-0">{{ $editingPermissionId ? 'Edit Permission' : 'Create New Permission' }}</h2>
        </div>
        <div class="card-body">
            {{-- Use the correct form submission method based on editing state --}}
            <form wire:submit.prevent="{{ $editingPermissionId ? 'updatePermission' : 'createPermission' }}">
                <div class="row">
                    <!-- Name Input -->
                    <div class="col-md-4 mb-3">
                        <label for="{{ $editingPermissionId ? 'editingPermissionName' : 'newPermissionName' }}" class="form-label">Permission Name</label>
                        <input type="text" class="form-control @error($editingPermissionId ? 'editingPermissionName' : 'newPermissionName') is-invalid @enderror"
                               id="{{ $editingPermissionId ? 'editingPermissionName' : 'newPermissionName' }}"
                               wire:model.lazy="{{ $editingPermissionId ? 'editingPermissionName' : 'newPermissionName' }}"
                               placeholder="e.g., Create Posts">
                        @error($editingPermissionId ? 'editingPermissionName' : 'newPermissionName') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Key Input (THE MISSING FIELD) -->
                    <div class="col-md-3 mb-3">
                        <label for="{{ $editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey' }}" class="form-label">Permission Key</label>
                        <input type="text" class="form-control @error($editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey') is-invalid @enderror"
                               id="{{ $editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey' }}"
                               wire:model.lazy="{{ $editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey' }}"
                               placeholder="e.g., posts.create">
                        @error($editingPermissionId ? 'editingPermissionKey' : 'newPermissionKey') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Group Input -->
                    <div class="col-md-3 mb-3">
                        <label for="{{ $editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName' }}" class="form-label">Group Name (Table)</label>
                        <input type="text" class="form-control @error($editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName') is-invalid @enderror"
                               id="{{ $editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName' }}"
                               wire:model.lazy="{{ $editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName' }}"
                               placeholder="e.g., posts_management">
                        @error($editingPermissionId ? 'editingPermissionTableName' : 'newPermissionTableName') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="col-md-2 d-flex align-items-end mb-3">
                        @if($editingPermissionId)
                            <button type="submit" class="btn btn-success w-100">Update</button>
                            <button wire:click="cancelEdit" type="button" class="btn btn-secondary w-100 ms-2">Cancel</button>
                        @else
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
