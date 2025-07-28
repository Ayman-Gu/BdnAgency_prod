<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceEmailing;

class ServiceEmailingSectionToggles extends Component
{
    public ServiceEmailing $page;

    public array $sections = [];

    public function mount()
    {
        $this->page = ServiceEmailing::first();

        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'Les_caractéristiques_de_BDN_Agency' => $this->page->Les_caractéristiques_de_BDN_Agency,
            'email_Marketing' => $this->page->email_Marketing,
            'automatisation_du_marketing' => $this->page->automatisation_du_marketing,
            'Commencer_avec_BDN_Agency' => $this->page->Commencer_avec_BDN_Agency,
            'section_des_services' => $this->page->section_des_services,
            'section_des_offres' => $this->page->section_des_offres,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {
        $this->authorize('manageDisplaySections',ServiceEmailing::class);


        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }

    public function render()
    {
        $this->authorize('viewAny',ServiceEmailing::class);

        return view('livewire.service-emailing-section-toggles');
    }
}
