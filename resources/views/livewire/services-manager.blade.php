<div>
    <style>
        .na {
            border-style: dashed !important;
            opacity: 0.6;
            text-decoration: line-through;
        }
    </style>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="mb-3">
        <label class="form-label">Choisissez un service :</label>
        <select wire:change="selectService($event.target.value)" class="form-select">
            <option value="">-- Choisir un service --</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}"
                    @if($service->packs->count() >= 4) disabled @endif
                    @if($selectedService == $service->id) selected @endif>
                    {{ $service->name }}
                </option>
            @endforeach
        </select>
    </div>

    @if($selectedService)
        <div class="mb-3">
            <label class="form-label">Nom du pack :</label>
            <select wire:model="packTypeId" class="form-select">
                <option value="">-- Choisir un type de pack --</option>
                @foreach($packTypes as $type)
                    <option value="{{ $type->id }}"
                        @if(in_array($type->id, $usedPackTypes) && $type->id != $editingPackTypeId) disabled @endif>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Prix :</label>
            <input type="number" step="0.01" class="form-control" wire:model="price" placeholder="ex: 29.99">
        </div>

        <h5 class="mt-4">Offres du pack</h5>
        @foreach($offers as $index => $offer)
            <div class="d-flex align-items-center mb-2">
                <input type="text" 
                       class="form-control me-2 {{ $offer['active'] ? '' : 'na' }}" 
                       wire:model="offers.{{ $index }}.name" 
                       placeholder="Nom de l'offre">

                <!-- Toggle active/inactive -->
                <button class="btn btn-sm btn-outline-secondary me-2" 
                        wire:click="toggleOfferActive({{ $index }})">
                    {{ $offer['active'] ? '✔️ Active' : '🚫 NA' }}
                </button>
            <button
                class="btn btn-sm btn-danger"
                wire:click.prevent="removeOffer({{ $offer['id'] ?? 'null' }})"
                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')"
            >
                Supprimer
            </button>

              
            </div>
        @endforeach

        <button class="btn btn-sm btn-primary mt-2" wire:click="addOfferField">Ajouter une offre</button>

        <div class="mt-4">
            <button type="button" class="btn btn-success" wire:click="savePack">Enregistrer le pack</button>
            @if($editingPackId)
                <button class="btn btn-warning ms-2" wire:click="cancelEdit">Annuler</button>
                <button class="btn btn-danger ms-2" wire:click="deletePack">Supprimer le pack</button>
            @endif
        </div>
    @endif

    @if($packs->count())
        <h3 class="mt-5">Packs enregistrés</h3>
        <div class="row">
            @foreach($packs as $pack)
                <div class="col-md-4 mb-4">
                   <div class="card h-100 shadow-sm {{ !$pack->active ? 'border-danger opacity-50' : '' }}">
                        <div class="card-body">
                            <p>Service : {{ $pack->service->name }}</p>
                            <h5 class="mt-3 mb-4">Pack : {{ $pack->packType->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">${{ number_format($pack->price, 2) }}</h6>
                        
                            <ul class="list-group list-group-flush mb-3">
                                @foreach($pack->offers as $offer)
                                    <li class="list-group-item {{ $offer->active ? '' : 'text-muted text-decoration-line-through' }}">
                                        Offre : {{ $offer->name }}
                                        @if(!$offer->active)
                                            <span class="badge bg-secondary ms-2">NA</span>
                                        @endif
                                    </li>
                                    
                                @endforeach
                            </ul>
                        
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-primary btn-sm" wire:click="editPack({{ $pack->id }})">Modifier</button>
                            
                                <!-- Toggle pack activation -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input switch-orange"
                                           type="checkbox"
                                           id="togglePack{{ $pack->id }}"
                                           wire:click="togglePackActive({{ $pack->id }})"
                                           @if($pack->active) checked @endif>
                                    <label class="form-check-label ms-1" for="togglePack{{ $pack->id }}">
                                        {{ $pack->active ? 'Actif' : 'Inactif' }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endif
</div>
