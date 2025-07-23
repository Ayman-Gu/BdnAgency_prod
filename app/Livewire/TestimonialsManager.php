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

    public function mount()
    {
        // Authorization to view any testimonial
        $this->authorize('viewAny', Testimonial::class);
    }

    public function resetForm()
    {
        $this->reset(['content', 'author', 'testimonialId', 'editing']);
    }

    public function store()
    {
        $this->authorize('create', Testimonial::class);

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
        $testimonial = Testimonial::findOrFail($id);
        $this->authorize('update', $testimonial);

        $this->testimonialId = $id;
        $this->content = $testimonial->content;
        $this->author = $testimonial->author;
        $this->editing = true;
    }

    public function update()
    {
        $this->validate();

        $testimonial = Testimonial::findOrFail($this->testimonialId);
        $this->authorize('update', $testimonial);

        $testimonial->update([
            'content' => $this->content,
            'author' => $this->author,
        ]);

        $this->resetForm();
        session()->flash('message', 'Testimonial updated successfully.');
    }

    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->authorize('delete', $testimonial);

        $testimonial->delete();

        session()->flash('message', 'Testimonial deleted successfully.');
    }

    public function render()
    {
        $this->authorize('viewAny', Testimonial::class);

        return view('livewire.testimonials-manager', [
            'testimonials' => Testimonial::latest()->get()
        ]);
    }
}
