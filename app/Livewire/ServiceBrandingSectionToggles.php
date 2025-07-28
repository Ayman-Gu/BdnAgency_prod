<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceBranding;

class ServiceBrandingSectionToggles extends Component
{   
    public ServiceBranding $page;

    public array $sections = [];

    public function mount()
    {
        $this->page = ServiceBranding::first();

        $this->authorize('viewAny',ServiceBranding::class);

        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'Nos_piliers_pour_une_identité_visuelle' => $this->page->Nos_piliers_pour_une_identité_visuelle,
            'avantage_bdn_agency' => $this->page->avantage_bdn_agency,
            'Des_marques_qui_rayonnent' => $this->page->Des_marques_qui_rayonnent,
            'Demander_une_consultation_Branding' => $this->page->Demander_une_consultation_Branding,
            'section_des_offres' => $this->page->section_des_offres,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {

        $this->authorize('manageDisplaySections',ServiceBranding::class);

        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }

    public function render()
    {

        return view('livewire.service-branding-section-toggles');
    }
}
