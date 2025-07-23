<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManagement extends Component
{
    public $name, $email, $password, $role_id;
    public $users;
    public $roles;
    public $editId = null;
    public $showForm = false;

    public function mount()
    {
        $this->authorize('viewAny', User::class);
        $this->users = User::with('role')->get();
        $this->roles = Role::all();
    }

    public function store()
    {
        if ($this->editId) {
            $this->authorize('update', User::findOrFail($this->editId));
        } else {
            $this->authorize('create', User::class);
        }

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->editId)],
            'password' => $this->editId ? 'nullable|min:6' : 'required|min:6',
            'role_id' => 'required|exists:roles,id'
        ]);

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ];

        if ($this->password) {
            $userData['password'] = Hash::make($this->password);
        }

        User::updateOrCreate(['id' => $this->editId], $userData);

        session()->flash('success', $this->editId ? 'Utilisateur mis à jour avec succès.' : 'Utilisateur ajouté avec succès.');

        $this->resetForm();
        $this->users = User::with('role')->get();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        $this->editId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        $this->password = '';
        $this->showForm = true;

    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);

        $user->delete();
        $this->users = User::with('role')->get();
        session()->flash('success', 'Utilisateur supprimé avec succès.');
    }

    public function resetForm()
    {
        $this->editId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role_id = '';
        $this->showForm = false;

    }

    public function render()
    {
        return view('livewire.user-management');
    }
}
