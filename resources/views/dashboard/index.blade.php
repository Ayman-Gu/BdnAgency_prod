@extends('dashboard.layouts.layout')

@section('content')
    <p class="fw-bold fs-4">Manage Pages</p>
    <livewire:home-section-toggles/>
    <livewire:service-emailing-section-toggles/>
    <livewire:service-sms-section-toggles/>
    <livewire:service-bdd-section-toggles />
    <livewire:service-newsletter-section-toggles/>
    <livewire:service-visionnaire-section-toggles/>
    <livewire:service-branding-section-toggles/>
@endsection
