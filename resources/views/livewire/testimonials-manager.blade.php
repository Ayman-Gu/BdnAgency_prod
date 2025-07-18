<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $editing ? 'update' : 'store' }}">
        <textarea wire:model="content" class="form-control mb-2" placeholder="Testimonial Content" style="min-height: 250px"></textarea>
        <input wire:model="author" type="text" class="form-control mb-2" placeholder="Author">
        <button type="submit" class="btn btn-primary">{{ $editing ? 'Update' : 'Add' }}</button>
        @if ($editing)
            <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancel</button>
        @endif
    </form>

    <hr>

    <div class="row">
        @foreach ($testimonials as $testimonial)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <p>" {{ $testimonial->content }}"</p>
                        <h6 class="mb-0">{{ $testimonial->author }}</h6>
                        <div class="mt-2">
                            <button wire:click="edit({{ $testimonial->id }})" class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $testimonial->id }})" class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
