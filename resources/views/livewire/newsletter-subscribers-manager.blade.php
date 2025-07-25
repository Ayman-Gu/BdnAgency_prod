<div>
    <div class="row align-items-end g-2 mb-3 flex-wrap">
    <div class="col-auto">
        <input
            type="text"
            wire:model.live.debounce.500ms="search"
            placeholder="Rechercher par email..."
            class="form-control form-control rounded-pill shadow-sm"
            value="{{ $search }}"
        />
    </div>

    <div class="col-auto">
        <input
            type="date"
            wire:model.live="dateFrom"
            class="form-control form-control rounded-pill shadow-sm"
            value="{{ $dateFrom }}"
        />
    </div>

    <div class="col-auto">
        <input
            type="date"
            wire:model.live="dateTo"
            class="form-control form-control rounded-pill shadow-sm"
            value="{{ $dateTo }}"
        />
    </div>

    <div class="col-auto">
        <button 
            wire:click="clearFilters" 
            class="btn btn-secondary rounded-pill shadow-sm fw-semibold"
            type="button"
        >
            <i class="bi bi-x-circle me-1"></i> Réinitialiser
        </button>
    </div>

    @can('deleteAll', \App\Models\NewsletterSubscriber::class)
        <div class="col-auto">
            <button 
                wire:click="deleteAll" 
                class="btn btn-danger rounded-pill shadow-sm fw-semibold"
                onclick="confirm('Êtes-vous sûr de vouloir supprimer tous les abonnés ?') || event.stopImmediatePropagation()"
            >
                <i class="bi bi-trash me-1"></i> Supprimer tout
            </button>
        </div>
    @endcan

    @can('export', \App\Models\NewsletterSubscriber::class)
        <div class="col-auto">
            <button 
                wire:click="exportAsExcel" 
                class="btn btn-success rounded-pill shadow-sm fw-semibold"
            >
                <i class="bi bi-file-earmark-excel me-1"></i> Exporter en Excel
            </button>
        </div>
    @endcan
</div>

    

    <div class="row mb-3">
        <div class="col-12">
            <p class="text-muted">
                Affichage de {{ $subscribers->total() }} abonné(s)
                @if(!empty($search) || !empty($dateFrom) || !empty($dateTo))
                    (filtré)
                @endif
            </p>
        </div>
    </div>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Abonné le</th>
                <th>Pays</th>
                <th>Adresse IP</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @forelse($subscribers as $subscriber)
                <tr wire:key="subscriber-{{ $subscriber->id }}">
                    <td>{{ $subscriber->id }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ $subscriber->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        {{ $subscriber->ip_address === '127.0.0.1' ? 'Localhost (Test)' : app(\App\Livewire\NewsletterSubscribersManager::class)->getCountryByIp($subscriber->ip_address) }}
                    </td>

                    <td>{{ $subscriber->ip_address ?? '-' }}</td>
                    <td>
                       @can('delete', \App\Models\NewsletterSubscriber::class)
                            <button 
                                class="btn btn-sm btn-outline-danger"
                                wire:click="deleteSubscriber({{ $subscriber->id }})"
                            >
                                <i class="bi bi-trash"></i>
                            </button>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun abonné trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $subscribers->links() }}
    </div>
</div>
