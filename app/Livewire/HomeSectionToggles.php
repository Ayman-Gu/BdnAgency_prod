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

        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'about_section' => $this->page->about_section,
            'features_section' => $this->page->features_section,
            'cta_section' => $this->page->cta_section,
            'services_section' => $this->page->services_section,
            'portfolio_section' => $this->page->portfolio_section,
            'testimonials_section' => $this->page->testimonials_section,
            'pricing_section' => $this->page->pricing_section,
            'faq_section' => $this->page->faq_section,
            'team_section' => $this->page->team_section,
            'recentposts_section' => $this->page->recentposts_section,
            'contact_section' => $this->page->contact_section,
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
        return view('livewire.home-section-toggles');
    }
}
