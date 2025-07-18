<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;

class TestimonialsManager extends Component
{
    public $content, $author, $testimonialId;
    public $editing = false;

    protected $rules = [
        'content' => 'required|string',
        'author' => 'required|string',
    ];

    public function resetForm()
    {
        $this->reset(['content', 'author', 'testimonialId', 'editing']);
    }

    public function store()
    {
        $this->validate();
        Testimonial::create([
            'content' => $this->content,
            'author' => $this->author,
        ]);
        $this->resetForm();
        session()->flash('message', 'Testimonial created successfully.');
    }

    public function edit($id)
    {
        $t = Testimonial::findOrFail($id);
        $this->testimonialId = $id;
        $this->content = $t->content;
        $this->author = $t->author;
        $this->editing = true;
    }

    public function update()
    {
        $this->validate();
        $t = Testimonial::findOrFail($this->testimonialId);
        $t->update([
            'content' => $this->content,
            'author' => $this->author,
        ]);
        $this->resetForm();
        session()->flash('message', 'Testimonial updated successfully.');
    }

    public function delete($id)
    {
        $t = Testimonial::findOrFail($id);
        $t->delete();
    }
    public function render()
    {
        return view('livewire.testimonials-manager', [
            'testimonials' => Testimonial::latest()->get()
        ]);
    }
}
