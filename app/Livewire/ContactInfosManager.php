<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactInfo;

class ContactInfosManager extends Component
{
    public $address, $phone, $email, $editingId = null;

    protected $rules = [
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
    ];

    public function save()
    {
        $this->validate();

        ContactInfo::updateOrCreate(
            ['id' => $this->editingId],
            [
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
            ]
        );

        $this->resetFields();
    }

    public function edit($id)
    {
        $info = ContactInfo::findOrFail($id);
        $this->editingId = $info->id;
        $this->address = $info->address;
        $this->phone = $info->phone;
        $this->email = $info->email;
    }

    public function delete($id)
    {
        ContactInfo::findOrFail($id)->delete();
    }

    public function setActive($id)
    {
        ContactInfo::query()->update(['is_active' => 0]);
        ContactInfo::findOrFail($id)->update(['is_active' => 1]);
    }

    public function resetFields()
    {
        $this->address = '';
        $this->phone = '';
        $this->email = '';
        $this->editingId = null;
    }

    public function render()
    {
        return view('livewire.contact-infos-manager',['infos' => ContactInfo::all()]);
    }
}
