<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceVisionnaire;

class ServiceVisionnaireSectionToggles extends Component
{
    public ServiceVisionnaire $page;

    public array $sections = [];

    public function mount()
    {
        
        $this->page = ServiceVisionnaire::first();

        $this->authorize('viewAny',ServiceVisionnaire::class);
        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'Des_formats_adaptés_à_vos_objectifs' => $this->page->Des_formats_adaptés_à_vos_objectifs,
            'Pourquoi_choisir_Le_Visionnaire' => $this->page->Pourquoi_choisir_Le_Visionnaire,
            'Devenir_un_partenaire' => $this->page->Devenir_un_partenaire,
            'Prêt_à_transformer_votre_visibilité' => $this->page->Prêt_à_transformer_votre_visibilité,
            'section_des_offres' => $this->page->section_des_offres,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {
        $this->authorize('manageDisplaySections',ServiceVisionnaire::class);


        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }

    public function render()
    {

        return view('livewire.service-visionnaire-section-toggles');
    }
}
