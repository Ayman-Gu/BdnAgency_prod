<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class RolesManagement extends Component
{
    public $roles;
    public $name;
    public $display_name;
    public $roleId;
    public $isEditing = false;
    public $showForm = false;

    protected $listeners = ['roleDeleted' => 'render'];

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('roles')->ignore($this->roleId),
            ],
            'display_name' => 'nullable|string|max:100',
        ];
    }

    protected $messages = [
        'name.required' => 'Le nom du rôle est obligatoire.',
        'name.unique' => 'Ce nom de rôle existe déjà.',
        'name.min' => 'Le nom du rôle doit contenir au moins 3 caractères.',
        'name.max' => 'Le nom du rôle ne doit pas dépasser 50 caractères.',
        'display_name.max' => 'Le nom d\'affichage ne doit pas dépasser 100 caractères.',
    ];

    public function mount()
    {
        $this->loadRoles();
    }

    public function loadRoles()
    {
        $this->roles = Role::all();
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->showForm = true;
    }

    public function store()
    {
        $this->authorize('create', Role::class);
        $this->validate();

        try {
            Role::create([
                'name' => $this->name,
                'display_name' => $this->display_name,
            ]);

            session()->flash('success', 'Rôle créé avec succès.');
            $this->resetForm();
            $this->showForm = false;
            $this->loadRoles();
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la création du rôle: ' . $e->getMessage());
            Log::error('Role creation error: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $this->authorize('update', Role::class);

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

    public function update()
    {
        $this->authorize('update', Role::class);
        $this->validate();

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
            $this->resetForm();
            $this->showForm = false;
            $this->loadRoles();
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la mise à jour du rôle: ' . $e->getMessage());
            Log::error('Role update error: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $this->authorize('delete', Role::class);

        try {
            $role = Role::find($id);
            if (!$role) {
                session()->flash('error', 'Rôle à supprimer non trouvé.');
                return;
            }

            $role->delete();
            session()->flash('success', 'Rôle supprimé avec succès.');
            $this->loadRoles();
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la suppression du rôle: ' . $e->getMessage());
            Log::error('Role deletion error: ' . $e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->reset(['name', 'display_name', 'roleId', 'isEditing']);
        $this->resetValidation();
    }

    public function cancel()
    {
        $this->showForm = false;
        $this->resetForm();
    }

    public function render()
    {
        $this->authorize('viewAny', Role::class);
        $this->loadRoles();
        return view('livewire.roles-management');
    }
}
