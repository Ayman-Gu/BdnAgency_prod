<div>
    <div class="card shadow-sm mt-5">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Gérer l’Affichage des Sections de Service d’Emailing</h3>
        </div>
        <div class="card-body">
            @can('manageDisplaySections', $page)
            <form>
                <div class="row">
                    @foreach($sections as $section => $enabled)
                        <div class="col-md-4 d-flex align-items-center mb-3">
                            <label for="{{ $section }}" class="me-3 text-capitalize fw-semibold" style="width: 150px;">
                                {{ str_replace('_', ' ', $section) }}
                            </label>

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
                        </div>
                    @endforeach
                </div>
            </form>
            @endcan
        </div>
    </div>

    <style>
    .form-check-input.switch-orange {
      background-color: #ddd;
      border-radius: 1rem;
      width: 2.5em;
      height: 1.5em;
      transition: background-color 0.3s ease;
      border: 1px solid #ccc;
      position: relative;
    }

    .form-check-input.switch-orange:before {
      content: "";
      position: absolute;
      top: 0.125em;
      left: 0.125em;
      width: 1.25em;
      height: 1.25em;
      background: white;
      border-radius: 50%;
      transition: transform 0.3s ease;
      box-shadow: 0 0 2px rgba(0,0,0,0.2);
    }

    .form-check-input.switch-orange:checked {
      background-color: #ff6600;
      border-color: #ff6600;
    }

    .form-check-input.switch-orange:checked:before {
      transform: translateX(1em);
    }

    .form-check-input.switch-orange:focus {
      box-shadow: 0 0 0 0.25rem rgba(255, 102, 0, 0.5);
    }
    </style>
</div>
