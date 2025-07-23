<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactInfo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContactInfosManager extends Component
{
    use AuthorizesRequests;

    public $address, $phone, $email, $editingId = null;

    protected $rules = [
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
    ];

    public function create()
    {
        $this->authorize('create', ContactInfo::class);

        $this->validate();

        ContactInfo::create([
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'is_active' => false,
        ]);

        $this->resetForm();
    }

    public function update()
    {
        $this->authorize('update', ContactInfo::class);

        $this->validate();

        $info = ContactInfo::findOrFail($this->editingId);
        $info->update([
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $info = ContactInfo::findOrFail($id);
        $this->authorize('update', $info);

        $this->editingId = $info->id;
        $this->address = $info->address;
        $this->phone = $info->phone;
        $this->email = $info->email;
    }

    public function delete($id)
    {
        $info = ContactInfo::findOrFail($id);
        $this->authorize('delete', $info);

        $info->delete();

        session()->flash('success', 'Information supprimée avec succès.');
    }

    public function setActiveOnlyOne($id)
    {
        $info = ContactInfo::findOrFail($id);
        $this->authorize('update', $info);

        ContactInfo::query()->update(['is_active' => 0]);
        $info->update(['is_active' => 1]);
    }

    public function resetForm()
    {
        $this->reset(['address', 'phone', 'email', 'editingId']);
    }

    public function render()
    {
        $this->authorize('viewAny', ContactInfo::class);

        return view('livewire.contact-infos-manager', [
            'infos' => ContactInfo::all(),
        ]);
    }
}
