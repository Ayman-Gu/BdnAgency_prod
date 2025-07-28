<div class="container mt-4">

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form wire:submit.prevent="{{ $editMode ? 'update' : 'submit' }}" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nom du PDF</label>
            <input type="text" wire:model="name" id="name" placeholder="Entrez le nom du PDF" required class="form-control">
        <p class="text-secondary">
          NB : Le nom du fichier doit être écrit comme ceci : "note légale" ou "note-légale" *
        </p>
            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="pdf" class="form-label">{{ $editMode ? 'Remplacer le PDF (optionnel)' : 'Sélectionner un fichier PDF' }}</label>
            <input type="file" wire:model="pdf" id="pdf" accept=".pdf" class="form-control" {{ $editMode ? '' : 'required' }} />
            @error('pdf') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        @canany(['create', 'update'], App\Models\PdfFile::class)
            <button type="submit" class="btn btn-{{ $editMode ? 'warning' : 'primary' }}" wire:loading.attr="disabled">
                <span wire:loading.remove>{{ $editMode ? 'Mettre à jour le PDF' : 'Téléverser le PDF' }}</span>
                <span wire:loading>
                    <i class="spinner-border spinner-border-sm me-1"></i>
                    {{ $editMode ? 'Mise à jour...' : 'Téléversement...' }}
                </span>
            </button>
        @endcanany

        @if ($editMode)
            <button type="button" wire:click="$set('editMode', false)" class="btn btn-secondary ms-2">Annuler</button>
        @endif
    </form>

    <h2 class="h5 mb-3">Liste des PDFs</h2>

    @if($pdfs->isEmpty())
        <p class="text-center text-muted">Aucun PDF trouvé.</p>
    @else
        <div class="row g-3">
            @foreach ($pdfs as $pdf)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        {{-- Aperçu PDF --}}
                       <div class="d-flex justify-content-center align-items-center bg-secondary text-white" 
                             style="height: 200px; font-size: 3rem;">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate mb-5"  title="{{ $pdf->name }}">{{ $pdf->name }}</h5>
                        
                            <div class="mt-auto d-flex justify-content-center gap-3">
                                <a href="{{ Storage::url($pdf->file_path) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-primary d-flex align-items-center justify-content-center"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="Voir">
                                    <i class="bi bi-eye"></i>
                                </a>
                            
                                <button wire:click="download({{ $pdf->id }})"
                                        class="btn btn-sm btn-success d-flex align-items-center justify-content-center"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Télécharger">
                                    <i class="bi bi-download"></i>
                                </button>
                                @can('update', App\Models\PdfFile::class)
                                    <button wire:click="edit({{ $pdf->id }})"
                                            class="btn btn-sm btn-warning d-flex align-items-center justify-content-center"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Modifier">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                @endcan
                                @can('delete', App\Models\PdfFile::class)
                                    <button wire:click="delete({{ $pdf->id }})"
                                            class="btn btn-sm btn-danger d-flex align-items-center justify-content-center"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce PDF ?')"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Supprimer">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                @endcan
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
