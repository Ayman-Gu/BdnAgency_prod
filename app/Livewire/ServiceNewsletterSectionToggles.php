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

        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'features_section' => $this->page->features_section,
            'benefits_section' => $this->page->benefits_section,
            'examples_section' => $this->page->examples_section,
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
        return view('livewire.service-newsletter-section-toggles');
    }
}
