<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceSms;

class ServiceSmsSectionToggles extends Component
{
    public ServiceSms $page;

    public array $sections = [];

    public function mount()
    {
        $this->page = ServiceSms::first();

        $this->authorize('viewAny', ServiceSms::class);
        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'Les_Fonctionnalités_de_bdn_agency' => $this->page->Les_Fonctionnalités_de_bdn_agency,
            'creation_des_cas_dutilisation' => $this->page->creation_des_cas_dutilisation,
            'Une_technologie_de_pointe' => $this->page->Une_technologie_de_pointe,
            'Commencer_avec_BDN_Agency' => $this->page->Commencer_avec_BDN_Agency,
            'section_des_offres' => $this->page->section_des_offres,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {
        $this->authorize('manageDisplaySections', ServiceSms::class);

        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }

    public function render()
    {

        return view('livewire.service-sms-section-toggles');
    }
}
