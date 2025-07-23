<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;   
use App\Models\Blog;       
use App\Models\User;          
use App\Models\Testimonial;   

class HomeManager extends Component
{
    public $newsletterCount;
    public $blogsCount;
    public $usersCount;
    public $testimonialsCount;

    public function mount()
    {
        $this->newsletterCount = NewsletterSubscriber::count();
        $this->blogsCount = Blog::count();
        $this->usersCount = User::count();
        $this->testimonialsCount = Testimonial::count();
    }

    public function render()
    {
        return view('livewire.home-manager');
    }
}
