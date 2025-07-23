<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Faq;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FaqManager extends Component
{
    use AuthorizesRequests;

    public $faqs, $question, $answer, $faq_id, $is_active = false;
    public $updateMode = false;
    public $order = 0;

    protected $rules = [
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
        'is_active' => 'boolean',
        'order' => 'required|integer|min:0',
    ];

    public function render()
    {
        $this->authorize('viewAny', Faq::class);
        $this->faqs = Faq::orderBy('order')->get();
        return view('livewire.faq-manager');
    }

    public function store()
    {
        $this->authorize('create', Faq::class);
        $this->validate();

        Faq::create([
            'question' => $this->question,
            'answer' => $this->answer,
            'is_active' => $this->is_active,
            'order' => $this->order,
        ]);

        session()->flash('message', 'FAQ created successfully.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $this->authorize('update', Faq::class);

        $faq = Faq::findOrFail($id);
        $this->faq_id = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->is_active = (bool) $faq->is_active;
        $this->order = $faq->order;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->authorize('update', Faq::class);
        $this->validate();

        if ($this->faq_id) {
            $faq = Faq::find($this->faq_id);
            $faq->update([
                'question' => $this->question,
                'answer' => $this->answer,
                'is_active' => $this->is_active,
                'order' => $this->order,
            ]);

            session()->flash('message', 'FAQ updated successfully.');
            $this->resetFields();
        }
    }

    public function delete($id)
    {
        $this->authorize('delete', Faq::class);
        Faq::find($id)->delete();
        session()->flash('message', 'FAQ deleted successfully.');
    }

    public function resetFields()
    {
        $this->question = '';
        $this->answer = '';
        $this->faq_id = null;
        $this->order = 0;
        $this->is_active = false;
        $this->updateMode = false;
    }
}
