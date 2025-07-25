@extends('dashboard.layouts.layout')

@section('content')
    <h2 class="fw-semibold fs-4 mb-4">Gérer les pages du tableau de bord</h2>

    <p class="text-muted mb-3">Activez ou désactivez les sections affichées sur la page d’accueil :</p>

    <livewire:home-section-toggles />

    <hr class="my-4">

    <h5 class="fw-semibold mb-2">Services proposés</h5>

    <ul class="list-unstyled">
        <li class="mb-2"><livewire:service-emailing-section-toggles /></li>
        <li class="mb-2"><livewire:service-sms-section-toggles /></li>
        <li class="mb-2"><livewire:service-bdd-section-toggles /></li>
        <li class="mb-2"><livewire:service-newsletter-section-toggles /></li>
        <li class="mb-2"><livewire:service-visionnaire-section-toggles /></li>
        <li class="mb-2"><livewire:service-branding-section-toggles /></li>
    </ul>

    <hr class="my-4">

    <h5 class="fw-semibold mb-3">Page À propos</h5>
    <livewire:apropos-page-section-toggles />

    <style>
        .card-header{
          background-color: #e78c4b9a
        }
        .form-check-input.switch-orange {
            border-radius: 2rem;
            width: 2.5em;
            height: 1.5em;
            transition: background-color 0.3s ease;
            border: 1px solid #ccc;
            position: relative;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);

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
        }

        .form-check-input.switch-orange:checked {
            background-color: #ff6600;
            border-color: #ff6600;
        }

        .form-check-input.switch-orange:checked:before {
            transform: translateX(1em);
        }

        .form-check-input.switch-orange:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 102, 0, 0.3);
        }
    </style>
@endsection
