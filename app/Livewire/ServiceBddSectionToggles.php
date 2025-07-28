<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceBdd;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ServiceBddSectionToggles extends Component
{
    use  AuthorizesRequests;

    public ServiceBdd $page;
    public array $sections = [];

    public function mount()
    {
        $this->page = ServiceBdd::first();

        $this->authorize('viewAny',ServiceBdd::class);

        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'Les_atouts_de_nos_BDD' => $this->page->Les_atouts_de_nos_BDD,
            'Pourquoi_choisir_BDN_Agency' => $this->page->Pourquoi_choisir_BDN_Agency,
            'Location_de_BDD_adaptée_à_vos_besoins' => $this->page->Location_de_BDD_adaptée_à_vos_besoins,
            'section_temoignages' => $this->page->section_temoignages,
            'Démarrez_votre_prochaine_campagne' => $this->page->Démarrez_votre_prochaine_campagne,
            'section_des_offres' => $this->page->section_des_offres,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {
        $this->authorize('manageDisplaySections', ServiceBdd::class);

        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }

     public function render()
    {

        return view('livewire.service-bdd-section-toggles', [
            'sections' => $this->sections,
        ]);
    }
}
