<div class="container my-5">

    <div class="card shadow-lg border-0 mb-5">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $updateMode ? 'Modifier la FAQ' : 'Ajouter une nouvelle FAQ' }}</h3>
        </div>

        <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Question</label>
                        <input type="text" wire:model="question" class="form-control rounded-3 shadow-sm"
                            placeholder="Entrez la question">
                        @error('question') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Réponse</label>
                        <textarea wire:model="answer" class="form-control rounded-3 shadow-sm" rows="4"
                            placeholder="Entrez la réponse"></textarea>
                        @error('answer') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Ordre d'affichage</label>
                        <input type="number" wire:model="order" class="form-control rounded-3 shadow-sm"
                            placeholder="Entrez l'ordre d'affichage (ex. 1 pour premier)">
                        @error('order') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" wire:model="is_active" id="isActive">
                    <label class="form-check-label" for="isActive">Marquer comme actif</label>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-success px-4">{{ $updateMode ? 'Mettre à jour' : 'Enregistrer' }}</button>
                    @if($updateMode)
                        <button type="button" wire:click="resetFields" class="btn btn-outline-secondary px-4">
                            Annuler
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Liste des FAQ</h4>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Question</th>
                            <th>Réponse</th>
                            <th style="width: 90px;">Ordre</th>
                            <th>Statut</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $faq)
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>{{ Str::limit($faq->answer, 80) }}</td>
                                <td>{{ $faq->order }}</td>
                                <td>
                                    <span class="badge {{ $faq->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $faq->is_active ? 'Actif' : 'Inactif' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button wire:click="edit({{ $faq->id }})"
                                        class="btn btn-sm btn-outline-warning me-2">Modifier</button>
                                    <button wire:click="delete({{ $faq->id }})"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette FAQ ?')">
                                        Supprimer
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Aucune FAQ disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
