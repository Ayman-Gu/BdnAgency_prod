<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;

class NewsletterForm extends Component
{
    public $sidebarEmail = '';
    public $first_name;
    public $last_name;
    public $phone;

    public function submit()
    {
        $this->validate([
            'sidebarEmail' => 'required|email|unique:newsletter_subscribers,email',
        ], [
            'sidebarEmail.required' => 'Veuillez entrer votre adresse email.',
            'sidebarEmail.email' => 'Veuillez entrer une adresse email valide.',
            'sidebarEmail.unique' => 'Cet email est déjà abonné.',
        ]);

        // Trigger popup
        $this->dispatch('open-sidebar-modal');
    }

    public function submitSidebarModal()
    {
        $this->validate([
            'sidebarEmail' => 'required|email|unique:newsletter_subscribers,email',
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'phone'        => 'nullable|string',
        ], [
            'sidebarEmail.required' => 'Veuillez entrer votre adresse email.',
            'first_name.required' => 'Veuillez entrer votre prénom.',
            'last_name.required' => 'Veuillez entrer votre nom.',
        ]);

        NewsletterSubscriber::create([
            'email' => $this->sidebarEmail,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'ip_address' => request()->ip(),
        ]);

        $this->reset(['sidebarEmail', 'first_name', 'last_name', 'phone']);

        session()->flash('success', 'Merci pour votre abonnement !');

        // Close modal
        $this->dispatch('close-sidebar-modal');
    }

    public function render()
    {
        $pdfFile = \App\Models\PdfFile::whereRaw('LOWER(name) LIKE ?', ['%note%legale%'])->first();

        return view('livewire.newsletter-form', ['pdfFile' => $pdfFile]);
    }
}
