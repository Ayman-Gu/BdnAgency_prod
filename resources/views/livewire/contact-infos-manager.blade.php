<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $editingId ? 'Modifier les infos de contact' : 'Ajouter une nouvelle info de contact' }}</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-control" wire:model="address" placeholder="Entrez l'adresse">
                </div>
                <div class="mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="text" class="form-control" wire:model="phone" placeholder="Entrez le numéro de téléphone">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" wire:model="email" placeholder="Entrez l'email">
                </div>
                <button type="submit" class="btn btn-success">
                    {{ $editingId ? 'Mettre à jour' : 'Ajouter' }}
                </button>
            </form>
        </div>
    </div>

    <div class="mt-5">
        <h5 class="mb-3">Liste des infos de contact</h5>
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
                        <button class="btn btn-primary btn-sm" wire:click="edit({{ $info->id }})">Modifier</button>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $info->id }})">Supprimer</button>
                        <button class="btn btn-outline-success btn-sm" wire:click="setActive({{ $info->id }})">Définir comme active</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
