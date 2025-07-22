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
            'features_section' => $this->page->features_section,
            'emailMarketing_section' => $this->page->emailMarketing_section,
            'automation_section' => $this->page->automation_section,
            'cta_section' => $this->page->cta_section,
            'services_section' => $this->page->services_section,
            'pricing_section' => $this->page->pricing_section,
        ];
    }

    public function toggleSectionSwitch(string $section)
    {
        $this->authorize('manageDisplaySections', $this->page);


        $this->sections[$section] = $this->sections[$section] == 1 ? 0 : 1;

        $this->page->{$section} = $this->sections[$section];
        $this->page->save();
    }

    public function render()
    {
        $this->authorize('viewAny', $this->page);

        return view('livewire.service-emailing-section-toggles');
    }
}
