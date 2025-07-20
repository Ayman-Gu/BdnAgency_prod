<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $editing ? 'update' : 'store' }}">
        <textarea wire:model="content" class="form-control mb-2" placeholder="Contenu du témoignage" style="min-height: 250px"></textarea>
        <input wire:model="author" type="text" class="form-control mb-2" placeholder="Auteur">
        <button type="submit" class="btn btn-primary">{{ $editing ? 'Mettre à jour' : 'Ajouter' }}</button>
        @if ($editing)
            <button type="button" class="btn btn-secondary" wire:click="resetForm">Annuler</button>
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
                            <button wire:click="edit({{ $testimonial->id }})" class="btn btn-sm btn-warning">Modifier</button>
                            <button wire:click="delete({{ $testimonial->id }})" class="btn btn-sm btn-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
