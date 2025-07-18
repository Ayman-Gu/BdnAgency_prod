<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;
use Livewire\Attributes\Dispatchable;
use Illuminate\Support\Str;

class FooterNewsletter extends Component
{
    public $footerEmail = '';
    public $first_name;
    public $last_name;
    public $phone;

    //Open popup
    public function submit()
    {
        $this->validate([
            'footerEmail' => 'required|email|unique:newsletter_subscribers,email',
        ], [
            'footerEmail.required' => 'Veuillez entrer votre adresse email.',
            'footerEmail.email' => 'Veuillez entrer une adresse email valide.',
            'footerEmail.unique' => 'Cet email est déjà abonné.',
        ]);

        // Don't save yet — just trigger popup
       $this->dispatch('open-newsletter-modal');
    }

    //Save full form
    public function submitModal()
    {
        $this->validate([
            'footerEmail' => 'required|email|unique:newsletter_subscribers,email',
            'first_name'  => 'required|string',
            'last_name'   => 'required|string',
            'phone'       => 'nullable|string',
        ], [
            'footerEmail.required' => 'Veuillez entrer votre adresse email.',
            'footerEmail.email' => 'Veuillez entrer une adresse email valide.',
            'footerEmail.unique' => 'Cet email est déjà abonné.',
            'first_name.required' => 'Veuillez entrer votre prénom.',
            'last_name.required' => 'Veuillez entrer votre nom.',
        ]);

        NewsletterSubscriber::create([
            'email' => $this->footerEmail,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'ip_address' => request()->ip(),
        ]);

        $this->reset(['footerEmail', 'first_name', 'last_name', 'phone']);
        session()->flash('success', 'Merci pour votre abonnement !');

        //Close modal if you want to
        $this->dispatch('close-newsletter-modal');
    }

    public function render()
    {
        $pdfFile = \App\Models\PdfFile::whereRaw('LOWER(name) LIKE ?', ['%note%legale%'])->first();

        return view('livewire.footer-newsletter', ['pdfFile' => $pdfFile,]);
    }
}
