<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role; // Import the Role model
use Illuminate\Validation\Rule; // Import Rule for unique validation

class RolesManagement extends Component
{
    public $roles; // Collection of all roles
    public $name; // For role name input
    public $display_name; // For role display name input
    public $roleId; // To store the ID of the role being edited

    public $isEditing = false; // Flag to determine if we are editing or creating
    public $showForm = false; // Flag to control the visibility of the form

    protected $listeners = ['roleDeleted' => 'render']; // Listen for an event if needed

    // Validation rules for role creation/update
    protected function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                // Ensure name is unique, ignore current role if editing
                Rule::unique('roles')->ignore($this->roleId),
            ],
            'display_name' => 'nullable|string|max:100',
        ];
    }

    // Custom validation messages (optional)
    protected $messages = [
        'name.required' => 'Le nom du rôle est obligatoire.',
        'name.unique' => 'Ce nom de rôle existe déjà.',
        'name.min' => 'Le nom du rôle doit contenir au moins 3 caractères.',
        'name.max' => 'Le nom du rôle ne doit pas dépasser 50 caractères.',
        'display_name.max' => 'Le nom d\'affichage ne doit pas dépasser 100 caractères.',
    ];

    // Lifecycle hook: Runs once when the component is first mounted
    public function mount()
    {
        $this->loadRoles();
    }

    // Helper to load roles from the database
    public function loadRoles()
    {
        $this->roles = Role::all();
    }

    // Show the form for creating a new role
    public function create()
    {
        $this->resetForm(); // Clear any previous data
        $this->isEditing = false;
        $this->showForm = true;
    }

    // Store a new role in the database
    public function store()
    {
        $this->validate(); // Run validation rules

        try {
            Role::create([
                'name' => $this->name,
                'display_name' => $this->display_name,
            ]);

            session()->flash('success', 'Rôle créé avec succès.');
            $this->resetForm(); // Clear form fields
            $this->showForm = false; // Hide the form
            $this->loadRoles(); // Refresh the list of roles
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la création du rôle: ' . $e->getMessage());
            Log::error('Role creation error: ' . $e->getMessage());
        }
    }

    // Show the form for editing an existing role
    public function edit($id)
    {
        $role = Role::find($id);
        if (!$role) {
            session()->flash('error', 'Rôle non trouvé.');
            return;
        }

        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->display_name = $role->display_name;
        $this->isEditing = true;
        $this->showForm = true;
    }

    // Update an existing role in the database
    public function update()
    {
        $this->validate(); // Run validation rules

        try {
            $role = Role::find($this->roleId);
            if (!$role) {
                session()->flash('error', 'Rôle à mettre à jour non trouvé.');
                return;
            }

            $role->update([
                'name' => $this->name,
                'display_name' => $this->display_name,
            ]);

            session()->flash('success', 'Rôle mis à jour avec succès.');
            $this->resetForm(); // Clear form fields
            $this->showForm = false; // Hide the form
            $this->loadRoles(); // Refresh the list of roles
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la mise à jour du rôle: ' . $e->getMessage());
            Log::error('Role update error: ' . $e->getMessage());
        }
    }

    // Delete a role from the database
    public function delete($id)
    {
        try {
            $role = Role::find($id);
            if (!$role) {
                session()->flash('error', 'Rôle à supprimer non trouvé.');
                return;
            }

            $role->delete();
            session()->flash('success', 'Rôle supprimé avec succès.');
            $this->loadRoles(); // Refresh the list of roles
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la suppression du rôle: ' . $e->getMessage());
            Log::error('Role deletion error: ' . $e->getMessage());
        }
    }

    // Reset form fields and validation errors
    public function resetForm()
    {
        $this->reset(['name', 'display_name', 'roleId', 'isEditing']);
        $this->resetValidation(); // Clear validation errors
    }

    // Cancel form action (hide form, reset fields)
    public function cancel()
    {
        $this->showForm = false;
        $this->resetForm();
    }

    public function render()
    {
        $this->loadRoles(); // Ensure roles are always fresh when rendering
        return view('livewire.roles-management');
    }
}