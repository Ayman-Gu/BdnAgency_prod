<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceBdd;

class ServiceBddSectionToggles extends Component
{
   public ServiceBdd $page;

    public array $sections = [];

    public function mount()
    {
        $this->page = ServiceBdd::first();

        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'features_section' => $this->page->features_section,
            'benefits_section' => $this->page->benefits_section,
            'use_cases_section' => $this->page->use_cases_section,
            'testimonials_section' => $this->page->testimonials_section,
            'cta_section' => $this->page->cta_section,
            'pricing_section' => $this->page->pricing_section,
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
        return view('livewire.service-bdd-section-toggles', [
            'sections' => $this->sections,
        ]);
    }
}
