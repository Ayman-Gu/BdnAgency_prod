<div class="container my-4">

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Button to show the form -->
    @can('create', App\Models\User::class)
        <button wire:click="$set('showForm', true)" class="btn btn-primary mb-3">Ajouter un utilisateur</button>
    @endcan

    <!-- Form -->
    @if($showForm)
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5>{{ $editId ? 'Modifier' : 'Ajouter' }} un utilisateur</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label for="name">Nom</label>
                        <input wire:model="name" type="text" class="form-control" id="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input wire:model="email" type="email" class="form-control" id="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password">Mot de passe</label>
                        <input wire:model="password" type="password" class="form-control" id="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role">Rôle</label>
                        <select wire:model="role_id" class="form-control">
                            <option value="">-- Choisir un rôle --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">{{ $editId ? 'Mettre à jour' : 'Ajouter' }}</button>
                        <button type="button" wire:click="resetForm" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- Users table -->
    <div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0">Liste des utilisateurs</h5>
        </div>
        <div class="card-body p-3">
            <table class="table table-hover table-borderless mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name ?? '-' }}</td>
                            <td>
                                @can('update', $user)
                                    <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-warning">Modifier</button>
                                @endcan
                                @can('delete', $user)
                                    <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
