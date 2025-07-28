<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceNewsletter;

class ServiceNewsletterSectionToggles extends Component
{
    public ServiceNewsletter $page;

    public array $sections = [];

    public function mount()
    {
        $this->page = ServiceNewsletter::first();

        $this->authorize('viewAny',ServiceNewsletter::class);
        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'Nos_services' => $this->page->Nos_services,
            'Pourquoi_choisir_BDN_Agency' => $this->page->Pourquoi_choisir_BDN_Agency,
            'Newsletters_pour_booster_votre_communication' => $this->page->Newsletters_pour_booster_votre_communication,
            'Propulsez_votre_communication_par_email' => $this->page->Propulsez_votre_communication_par_email,
            'section_des_offres' => $this->page->section_des_offres,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {

        $this->authorize('manageDisplaySections',ServiceNewsletter::class);

        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }

    public function render()
    {
        return view('livewire.service-newsletter-section-toggles');
    }
}
