<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;

class NewsletterForm extends Component
{
    public $sidebarEmail= '';

    public function submit()
    {
        $this->validate(
            [
                'sidebarEmail' => 'required|email|unique:newsletter_subscribers,email',
            ],
            [
                'sidebarEmail.required' => 'Veuillez entrer votre adresse email.',
                'sidebarEmail.email' => 'Veuillez entrer une adresse email valide.',
                'sidebarEmail.unique' => 'Cet email est déjà abonné.',
            ]
        );

        NewsletterSubscriber::create([
            'email' => $this->sidebarEmail,
            'ip_address' => request()->ip(),
        ]);

        $this->sidebarEmail = '';

        session()->flash('success', 'Merci pour votre abonnement !');
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}