<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AproposPage;

class AproposPageSectionToggles extends Component
{
    public AproposPage $page;

    public array $sections = [];
    
    public function mount()
    {
        $this->page = AproposPage::first();

        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'qui_sommes_nous_section' => $this->page->qui_sommes_nous_section,
            'nos_valeurs_section' => $this->page->nos_valeurs_section,
            'notre_histoire_section' => $this->page->notre_histoire_section,
            'notre_equipe_section' => $this->page->notre_equipe_section,
            'cta_section' => $this->page->cta_section,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {

        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }

    public function render()
    {
        return view('livewire.apropos-page-section-toggles', [
            'sections' => $this->sections,
        ]);
    }
}
