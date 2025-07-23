<div class="container my-4">
    @canany(['create', 'update'], \App\Models\ContactInfo::class)
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $editingId ? 'Modifier les infos de contact' : 'Ajouter une nouvelle info de contact' }}</h5>
        </div>
        <div class="card-body">
            <div>
                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-control" wire:model="address" placeholder="Entrez l'adresse">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="text" class="form-control" wire:model="phone" placeholder="Entrez le numéro de téléphone">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" wire:model="email" placeholder="Entrez l'email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                @if(!$editingId)
                    <button type="button" class="btn btn-success" wire:click="create">Ajouter</button>
                @else
                    <button type="button" class="btn btn-primary" wire:click="update">Mettre à jour</button>
                    <button type="button" class="btn btn-secondary" wire:click="resetForm">Annuler</button>
                @endif
            </div>
        </div>
    </div>
    @endcanany

    <div class="mt-5">
        <h5 class="mb-3">Liste des infos de contact</h5>
        @can('viewAny', \App\Models\ContactInfo::class)
            @foreach($infos as $info)
                <div class="card mb-3 border-{{ $info->is_active ? 'success' : 'secondary' }}">
                    <div class="card-body">
                        <h6 class="card-title mb-2"><strong>Adresse :</strong> {{ $info->address }}</h6>
                        <p class="mb-1"><strong>Téléphone :</strong> {{ $info->phone }}</p>
                        <p class="mb-2"><strong>Email :</strong> {{ $info->email }}</p>

                        @if($info->is_active)
                            <span class="badge bg-success mb-2">Active</span>
                        @endif

                        <div class="d-flex gap-2">
                            @can('update', \App\Models\ContactInfo::class)
                                <button class="btn btn-primary btn-sm" wire:click="edit({{ $info->id }})">Modifier</button>
                            @endcan

                            @can('delete', \App\Models\ContactInfo::class)
                                <button class="btn btn-danger btn-sm" wire:click="delete({{ $info->id }})">Supprimer</button>
                            @endcan

                            @can('update', \App\Models\ContactInfo::class)
                                <button class="btn btn-outline-success btn-sm" wire:click="setActiveOnlyOne({{ $info->id }})">Définir comme active</button>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        @endcan
    </div>
</div>
