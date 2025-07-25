<div>
    <div class="card shadow-lg border-0 mt-5 rounded-4">
        <div class="card-header text-white rounded-top-4 ">
            <h3 class="mb-0">Gérer l’Affichage des Sections du Service Visionnaire</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    @foreach($sections as $section => $enabled)
                        <div class="col-md-6 col-lg-4 d-flex align-items-center mb-4 p-3 rounded-3">
                            <label for="{{ $section }}" class="me-auto text-capitalize fw-semibold">
                                {{ str_replace('_', ' ', $section) }}
                            </label>
                            @can('manageDisplaySections', App\Models\ServiceVisionnaire::class)

                            <div class="form-check form-switch">
                                <input 
                                    class="form-check-input switch-orange" 
                                    type="checkbox" 
                                    role="switch" 
                                    id="{{ $section }}"
                                    wire:click="toggleSectionSwitch('{{ $section }}')"
                                    @if($enabled == 1) checked @endif
                                >
                            </div>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>

</div>
