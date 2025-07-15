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

        
        $this->sections = [
            'hero_section' => $this->page->hero_section,
            'features_section' => $this->page->features_section,
            'commerce_section' => $this->page->commerce_section,
            'technology_section' => $this->page->technology_section,
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
        return view('livewire.service-sms-section-toggles');
    }
}
