<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role; // 1. Import the Role model
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManagement extends Component
{
    public $name, $email, $password, $role_id; // 2. Add role_id property
    public $users;
    public $roles; // 3. Add a property to hold all roles
    public $editId = null;

    public function mount()
    {
        // 4. Load all users and all available roles when the component loads
        $this->users = User::with('role')->get(); // Eager load the role relationship
        $this->roles = Role::all();
    }

    public function store()
    {
        // 5. Add validation for role_id
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->editId)],
            'password' => $this->editId ? 'nullable|min:6' : 'required|min:6',
            'role_id' => 'required|exists:roles,id' // Ensure the selected role exists
        ]);

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ];

        if ($this->password) {
            $userData['password'] = Hash::make($this->password);
        }

        // 6. Use updateOrCreate to simplify the logic and include role_id
        User::updateOrCreate(['id' => $this->editId], $userData);

        session()->flash('success', $this->editId ? 'Utilisateur mis à jour avec succès.' : 'Utilisateur ajouté avec succès.');

        $this->resetForm();
        $this->users = User::with('role')->get(); // Refresh the user list
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->editId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id; // 7. Load the existing user's role_id
        $this->password = ''; // Clear password field on edit
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        $this->users = User::with('role')->get();
        session()->flash('success', 'Utilisateur supprimé avec succès.');
    }

    public function resetForm()
    {
        $this->editId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role_id = ''; // 8. Reset the role_id
    }
    
    public function render()
    {
        return view('livewire.user-management');
    }
}