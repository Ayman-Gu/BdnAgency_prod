<div class="container py-4">
    <div class="row g-4">
        {{-- Form Section (Create or Update Team Member) --}}
        @canany(['create', 'update'], \App\Models\Team::class)
        <div class="col-md-6">
            <div class="card shadow-lg h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 fw-light">{{ $editingId ? 'Modifier' : 'Ajouter' }} un membre de l’équipe</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save" enctype="multipart/form-data" id="leftForm">
                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" class="form-control" wire:model.defer="name" placeholder="Nom complet" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Poste</label>
                            <input type="text" class="form-control" wire:model.defer="position" placeholder="Poste" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" wire:model="image">
                            @if ($image instanceof \Livewire\TemporaryUploadedFile)
        <div class="mt-2">
            <img src="{{ $image->temporaryUrl() }}" alt="Aperçu" class="img-thumbnail" width="100">
        </div>
    @elseif ($existingImagePath)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $existingImagePath) }}" alt="Aperçu" class="img-thumbnail" width="100">
        </div>
    @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-lg h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 fw-light">Liens des réseaux sociaux</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Twitter</label>
                        <input type="text" class="form-control" wire:model.defer="twitter" placeholder="Lien Twitter">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Facebook</label>
                        <input type="text" class="form-control" wire:model.defer="facebook" placeholder="Lien Facebook">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instagram</label>
                        <input type="text" class="form-control" wire:model.defer="instagram" placeholder="Lien Instagram">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" wire:model.defer="linkedin" placeholder="Lien LinkedIn">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-start ms-3">
            <button type="submit" class="btn btn-success" form="leftForm">
                {{ $editingId ? 'Mettre à jour le membre' : 'Ajouter un membre' }}
            </button>
        </div>
        @endcanany
    </div>

    <hr class="my-4">

    {{-- Team Members List --}}
    @can('viewAny', \App\Models\Team::class)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($members as $member)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    @if($member->image)
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('storage/' . $member->image) }}" class="card-img-top object-fit-cover" alt="{{ $member->name }}">
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $member->name }}</h5>
                        <p class="card-text">{{ $member->position }}</p>
                        <div class="d-flex gap-2">
                            @if($member->twitter)<a href="{{ $member->twitter }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-twitter-x"></i></a>@endif
                            @if($member->facebook)<a href="{{ $member->facebook }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-facebook"></i></a>@endif
                            @if($member->instagram)<a href="{{ $member->instagram }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-instagram"></i></a>@endif
                            @if($member->linkedin)<a href="{{ $member->linkedin }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-linkedin"></i></a>@endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between p-3 border-top">
                        @can('update', \App\Models\Team::class)
                        <button wire:click="edit({{ $member->id }})" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Modifier
                        </button>
                        @endcan

                        @can('delete', \App\Models\Team::class)
                        <button wire:click="delete({{ $member->id }})" class="btn btn-danger btn-sm" onclick="confirm('Êtes-vous sûr ?') || event.stopImmediatePropagation()">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endcan
</div>
