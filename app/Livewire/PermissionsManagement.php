<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PermissionsManagement extends Component
{
    // Properties for assigning permissions to roles
    public $selectedRoleId = null;
    public $selectedPermissions = [];
    public $groupSelectAll = [];

    // Properties for CRUD operations on permissions
    public $newPermissionName = '';
    public $newPermissionKey = ''; // ADDED: For the new permission's key
    public $newPermissionTableName = '';
    public $editingPermissionId = null;
    public $editingPermissionName = '';
    public $editingPermissionKey = ''; // ADDED: For editing the permission's key
    public $editingPermissionTableName = '';

    /**
     * Validation rules for creating and updating permissions.
     */
    protected function rules()
    {
        // Rules for the editing form
        $editingRules = [
            'editingPermissionName' => ['required', 'string', 'max:255'],
            'editingPermissionKey' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9_.-]+$/', Rule::unique('permissions', 'key')->ignore($this->editingPermissionId)],
            'editingPermissionTableName' => 'required|string|max:255|regex:/^[a-z_]+$/',
        ];

        // Rules for the creation form
        $creationRules = [
            'newPermissionName' => 'required|string|max:255',
            'newPermissionKey' => 'required|string|max:255|regex:/^[a-z0-9_.-]+$/|unique:permissions,key',
            'newPermissionTableName' => 'required|string|max:255|regex:/^[a-z_]+$/',
        ];

        return $this->editingPermissionId ? $editingRules : $creationRules;
    }

    protected $messages = [
        'newPermissionKey.regex' => 'The key must only contain lowercase letters, numbers, underscores, and hyphens.',
        'newPermissionKey.unique' => 'This key is already in use.',
        'editingPermissionKey.regex' => 'The key must only contain lowercase letters, numbers, underscores, and hyphens.',
        'editingPermissionKey.unique' => 'This key is already in use.',
        'newPermissionTableName.regex' => 'The group name must be in lowercase snake_case format (e.g., user_management).',
        'editingPermissionTableName.regex' => 'The group name must be in lowercase snake_case format (e.g., user_management).',
    ];


    // =================================================================
    // Role & Permission Assignment Logic
    // =================================================================

    public function getRolesProperty()
    {
        return Role::all();
    }

    public function getPermissionsProperty()
    {
        return Permission::all()->sortBy('name')->groupBy('table_name');
    }

    public function updatedSelectedRoleId($roleId)
    {
        Log::info("Role selected ID: {$roleId}");
        if ($roleId) {
            $role = Role::with('permissions')->find($roleId);
            $this->selectedPermissions = $role->permissions->pluck('id')->map(fn($id) => (int) $id)->toArray();
            $this->updateGroupSelectAllState();
        } else {
            $this->reset(['selectedPermissions', 'groupSelectAll']);
            Log::info("Role deselected, permissions reset.");
        }
    }

    public function updatedGroupSelectAll($value, $group)
    {
        $permIdsInGroup = $this->permissions[$group]->pluck('id')->toArray();
        if ($value) {
            $this->selectedPermissions = array_unique(array_merge($this->selectedPermissions, $permIdsInGroup));
        } else {
            $this->selectedPermissions = array_diff($this->selectedPermissions, $permIdsInGroup);
        }
        $this->updatedSelectedPermissions();
    }

    public function updatedSelectedPermissions()
    {
        $this->selectedPermissions = array_map('intval', $this->selectedPermissions);
        $this->updateGroupSelectAllState();
    }

    private function updateGroupSelectAllState()
    {
        if (empty($this->permissions)) return;
        foreach ($this->permissions as $group => $perms) {
            $permIdsInGroup = $perms->pluck('id')->toArray();
            $allInGroupSelected = !empty($permIdsInGroup) && count(array_intersect($permIdsInGroup, $this->selectedPermissions)) === count($permIdsInGroup);
            $this->groupSelectAll[$group] = $allInGroupSelected;
        }
    }

    public function saveRolePermissions()
    {
        if (!$this->selectedRoleId) {
            session()->flash('error', 'Please select a role before saving.');
            return;
        }
        try {
            $role = Role::findOrFail($this->selectedRoleId);
            $role->permissions()->sync($this->selectedPermissions);
            session()->flash('success', "Permissions for '{$role->display_name}' have been updated successfully.");
            Log::info("Permissions successfully synced for role ID {$this->selectedRoleId}.");
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while saving permissions.');
            Log::error("Error saving permissions for role ID {$this->selectedRoleId}: " . $e->getMessage());
        }
    }

    // =================================================================
    // CRUD Logic for Permissions
    // =================================================================

    public function createPermission()
    {
        $validatedData = $this->validate([
            'newPermissionName' => 'required|string|max:255',
            'newPermissionKey' => 'required|string|max:255|regex:/^[a-z0-9_.-]+$/|unique:permissions,key',
            'newPermissionTableName' => 'required|string|max:255|regex:/^[a-z_]+$/',
        ]);

        Permission::create([
            'name' => $validatedData['newPermissionName'],
            'key' => $validatedData['newPermissionKey'], // FIXED: Add the key
            'table_name' => $validatedData['newPermissionTableName'],
        ]);

        session()->flash('success', 'Permission created successfully.');
        $this->reset(['newPermissionName', 'newPermissionKey', 'newPermissionTableName']);
        //dd($this->newPermissionName, $this->newPermissionKey, $this->newPermissionTableName);
    }

    public function editPermission($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $this->editingPermissionId = $permission->id;
        $this->editingPermissionName = $permission->name;
        $this->editingPermissionKey = $permission->key; // ADDED: Populate key for editing
        $this->editingPermissionTableName = $permission->table_name;
    }

    public function updatePermission()
    {
        if (!$this->editingPermissionId) return;

        $validatedData = $this->validate([
            'editingPermissionName' => 'required|string|max:255',
            'editingPermissionKey' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9_.-]+$/', Rule::unique('permissions', 'key')->ignore($this->editingPermissionId)],
            'editingPermissionTableName' => 'required|string|max:255|regex:/^[a-z_]+$/',
        ]);

        $permission = Permission::findOrFail($this->editingPermissionId);
        $permission->update([
            'name' => $validatedData['editingPermissionName'],
            'key' => $validatedData['editingPermissionKey'], // FIXED: Update the key
            'table_name' => $validatedData['editingPermissionTableName'],
        ]);

        session()->flash('success', 'Permission updated successfully.');
        $this->cancelEdit();
    }
    
    public function cancelEdit()
    {
        $this->reset(['editingPermissionId', 'editingPermissionName', 'editingPermissionKey', 'editingPermissionTableName']);
    }

    public function deletePermission($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $permission->roles()->detach();
        $permission->delete();
        session()->flash('success', 'Permission deleted successfully.');
    }
    public function render()
    {
        return view('livewire.permissions-management');
    }
}
