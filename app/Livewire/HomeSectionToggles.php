<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Home;

class HomeSectionToggles extends Component
{   
    public home $page;

    public array $sections = [];

    public function mount()
    {
        $this->page = Home::first();

        $this->authorize('viewAny',Home::class);

        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'section_apropos' => $this->page->section_apropos,
            'Ce_que_nous_offrons' => $this->page->Ce_que_nous_offrons,
            'Demander_un_devis' => $this->page->Demander_un_devis,
            'section_services' => $this->page->section_services,
            'section_Projets' => $this->page->section_Projets,
            'section_témoignages' => $this->page->section_témoignages,
            'section_des_offres' => $this->page->section_des_offres,
            'section_faq' => $this->page->section_faq,
            'section_équipe' => $this->page->section_équipe,
            'section_les_posts_recents' => $this->page->section_les_posts_recents,
            'contact_section' => $this->page->contact_section,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {
        $this->authorize('manageDisplaySections', Home::class);

        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }
    
    public function render()
    {
        return view('livewire.home-section-toggles');
    }
}
