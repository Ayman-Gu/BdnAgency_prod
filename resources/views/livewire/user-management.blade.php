<div class="container py-4">
    <h2 class="mb-4 h4">{{ $editId ? 'Modifier un utilisateur' : 'Ajouter un utilisateur' }}</h2>

    @if(session()->has('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="store" class="card card-body mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nom</label>
                <input type="text" wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom complet">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" wire:model.defer="email" class="form-control @error('email') is-invalid @enderror" placeholder="ex: utilisateur@email.com">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="row">
            <!-- START: Role Selection Dropdown -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Rôle</label>
                <select wire:model.defer="role_id" class="form-select @error('role_id') is-invalid @enderror">
                    <option value="">-- Choisir un rôle --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->display_name ?? $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <!-- END: Role Selection Dropdown -->
            
            <div class="col-md-6 mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" wire:model.defer="password" class="form-control @error('password') is-invalid @enderror" placeholder="Laissez vide pour ne pas changer">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                {{ $editId ? 'Mettre à jour' : 'Ajouter' }}
            </button>
            @if($editId)
                <button type="button" wire:click="resetForm" class="btn btn-secondary ms-2">Annuler</button>
            @endif
        </div>
    </form>

    <h2 class="mb-3 h4">Liste des utilisateurs</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th> <!-- Add Role column header -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <!-- Display role name, with a fallback -->
                    <span class="badge bg-primary">{{ $user->role->display_name ?? $user->role->name ?? 'N/A' }}</span>
                </td>
                <td>
                    <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-warning">Modifier</button>
                    <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger ms-2" wire:confirm="Êtes-vous sûr de vouloir supprimer cet utilisateur?">Supprimer</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Aucun utilisateur trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>