@extends('dashboard.layouts.layout')

@section('content')
    <h2 class="fw-semibold fs-4 mb-4">Gérer les pages du tableau de bord</h2>

    <p class="text-muted mb-3">Activez ou désactivez les sections affichées sur les pages de notre site web</p>
    <p class="text-muted mt-3 border-bottom fw-bold">/ Acceuil</p>

    <livewire:home-section-toggles />

    <p class="text-muted mt-3 border-bottom fw-bold">/ À propos</p>
    <livewire:apropos-page-section-toggles />
    <h5 class="fw-bold mb-2 mt-5">Services proposés</h5>

    <ul class="list-unstyled mt-4">
        <p class="text-muted mt-3 border-bottom fw-bold">/ Services / Plateforme Emailing</p>
        <li class="mb-2"><livewire:service-emailing-section-toggles /></li>
        <p class="text-muted mt-3 border-bottom fw-bold mt-5">/ Services / Plateforme Sms</p>
        <li class="mb-2"><livewire:service-sms-section-toggles /></li>
        <p class="text-muted mt-3 border-bottom fw-bold mt-5">/ Services / Base de Données</p>
        <li class="mb-2"><livewire:service-bdd-section-toggles /></li>
        <p class="text-muted mt-3 border-bottom fw-bold mt-5">/ Services / Gestion des newsletters</p>
        <li class="mb-2"><livewire:service-newsletter-section-toggles /></li>
        <p class="text-muted mt-3 border-bottom fw-bold mt-5">/ Services / Le visionnaire</p>
        <li class="mb-2"><livewire:service-visionnaire-section-toggles /></li>
        <p class="text-muted mt-3 border-bottom fw-bold mt-5">/ Services / Branding & Indentité visuelle</p>
        <li class="mb-2"><livewire:service-branding-section-toggles /></li>
    </ul>



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
