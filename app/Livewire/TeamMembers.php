<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\WithFileUploads;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TeamMembers extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public $name, $position, $image, $twitter, $facebook, $instagram, $linkedin;
    public $editingId = null;

    protected $rules = [
        'name' => 'required|string',
        'position' => 'required|string',
        'image' => 'nullable|mimes:jpg,jpeg,png,webp,gif|max:2048',
        'twitter' => 'nullable|string',
        'facebook' => 'nullable|string',
        'instagram' => 'nullable|string',
        'linkedin' => 'nullable|string',
    ];

    public function save()
    {
        $this->authorize($this->editingId ? 'update' : 'create',Team::class);

        $validatedData = $this->validate();

        if ($this->image) {
            // Save the uploaded image to 'storage/app/public/team'
            $validatedData['image'] = $this->image->store('team', 'public');
        } elseif ($this->editingId) {
            // Keep existing image if editing and no new image uploaded
            $member = Team::findOrFail($this->editingId);
            $validatedData['image'] = $member->image;
        } else {
            // No image at all for new record
            $validatedData['image'] = null;
        }

        if ($this->editingId) {
            Team::findOrFail($this->editingId)->update($validatedData);
        } else {
            Team::create($validatedData);
        }

        $this->resetFields();
        session()->flash('success', 'Member saved successfully.');
    }

    public function edit($id)
    {
        $this->authorize('update',Team::class);

        $member = Team::findOrFail($id);
        $this->editingId = $id;
        $this->name = $member->name;
        $this->position = $member->position;
        $this->twitter = $member->twitter;
        $this->facebook = $member->facebook;
        $this->instagram = $member->instagram;
        $this->linkedin = $member->linkedin;
    }

    public function delete($id)
    {
        $this->authorize('delete',Team::class);

        $member = Team::findOrFail($id);
        if ($member->image) {
            \Storage::disk('public')->delete($member->image);
        }
        $member->delete();
    }

    public function resetFields()
    {
        $this->reset(['name', 'position', 'image', 'twitter', 'facebook', 'instagram', 'linkedin', 'editingId']);
    }

    public function render()
    {
        $this->authorize('viewAny',Team::class);

        $members = Team::all();
        return view('livewire.team-members', compact('members'));
    }
}
