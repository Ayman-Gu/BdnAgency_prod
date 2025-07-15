<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;

class FooterNewsletter extends Component
{
    public $footerEmail = '';

    public function submit()
    {
        $this->validate(
            [
                'footerEmail' => 'required|email|unique:newsletter_subscribers,email',
            ],
            [
                'footerEmail.required' => 'Veuillez entrer votre adresse email.',
                'footerEmail.email' => 'Veuillez entrer une adresse email valide.',
                'footerEmail.unique' => 'Cet email est déjà abonné.',
            ]
        );

        NewsletterSubscriber::create([
            'email' => $this->footerEmail,
            'ip_address' => request()->ip(),
        ]);

        $this->footerEmail = '';

        session()->flash('success', 'Merci pour votre abonnement !');
    }

    public function render()
    {
        return view('livewire.footer-newsletter');
    }
}
