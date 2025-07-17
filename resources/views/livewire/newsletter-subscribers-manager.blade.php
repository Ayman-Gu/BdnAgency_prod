<div>
    <div class="row mb-3 align-items-end g-2">

        <div class="col-md-4">
            <input
                type="text"
                wire:model.live.debounce.500ms="search"
                placeholder="Search by email..."
                class="form-control"
                value="{{ $search }}"
            />
        </div>
    
        <div class="col-md-2">
            <input
                type="date"
                wire:model.live="dateFrom"
                class="form-control"
                value="{{ $dateFrom }}"
            />
        </div>
    
        <div class="col-md-2">
            <input
                type="date"
                wire:model.live="dateTo"
                class="form-control"
                value="{{ $dateTo }}"
            />
        </div>
    
        <div class="col-md-1">
            <button 
                wire:click="clearFilters" 
                class="btn btn-secondary w-100"
                type="button"
            >
                Clear
            </button>
        </div>
    
        <div class="col-md-1">
            <button 
                wire:click="deleteAll" 
                class="btn btn-danger w-100"
                onclick="confirm('Are you sure you want to delete all subscribers?') || event.stopImmediatePropagation()"
            >
                Delete
            </button>
        </div>
    
        <div class="col-md-2">
            <button 
                wire:click="exportAsExcel" 
                class="btn btn-success w-100"
            >
                Export as Excel
            </button>
        </div>
    
    </div>
    

    <div class="row mb-3">
        <div class="col-12">
            <p class="text-muted">
                Showing {{ $subscribers->total() }} subscriber(s)
                @if(!empty($search) || !empty($dateFrom) || !empty($dateTo))
                    (filtered)
                @endif
            </p>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Subscribed At</th>
                <th>Country</th>
                <th>IP Address</th>
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
                        {{ $subscriber->ip_address === '127.0.0.1' ? 'Localhost (Testing)' : app(\App\Livewire\NewsletterSubscribersManager::class)->getCountryByIp($subscriber->ip_address) }}
                    </td>

                    <td>{{ $subscriber->ip_address ?? '-' }}</td>
                    <td>
                        <button 
                            class="btn btn-sm btn-outline-danger"
                            wire:click="deleteSubscriber({{ $subscriber->id }})"
                        >
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No subscribers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $subscribers->links() }}
    </div>
</div>