<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PermissionsManagement extends Component
{
    public $selectedRoleId = null;
    public $selectedPermissions = [];
    public $groupSelectAll = [];

    public $newPermissionName = '';
    public $newPermissionKey = '';
    public $newPermissionTableName = '';
    public $editingPermissionId = null;
    public $editingPermissionName = '';
    public $editingPermissionKey = '';
    public $editingPermissionTableName = '';

    protected function rules()
    {
        $editingRules = [
            'editingPermissionName' => ['required', 'string', 'max:255'],
            'editingPermissionKey' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9_.-]+$/', Rule::unique('permissions', 'key')->ignore($this->editingPermissionId)],
            'editingPermissionTableName' => 'required|string|max:255|regex:/^[a-z_]+$/',
        ];

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

    public function getRolesProperty()
    {
        return Role::all();
    }

    public function getPermissionsProperty()
    {
        $this->authorize('viewAny', Permission::class);
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
        if (!is_array($this->selectedPermissions)) {
            $this->selectedPermissions = [];
        } else {
            $this->selectedPermissions = array_map('intval', $this->selectedPermissions);
        }
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

    public function createPermission()
    {
        $this->authorize('create', Permission::class);

        $validatedData = $this->validate([
            'newPermissionName' => 'required|string|max:255',
            'newPermissionKey' => 'required|string|max:255|regex:/^[a-z0-9_.-]+$/|unique:permissions,key',
            'newPermissionTableName' => 'required|string|max:255|regex:/^[a-z_]+$/',
        ]);

        Permission::create([
            'name' => $validatedData['newPermissionName'],
            'key' => $validatedData['newPermissionKey'],
            'table_name' => $validatedData['newPermissionTableName'],
        ]);

        session()->flash('success', 'Permission created successfully.');
        $this->reset(['newPermissionName', 'newPermissionKey', 'newPermissionTableName']);
    }

    public function editPermission($permissionId)
    {
        $this->authorize('update', Permission::class);

        $permission = Permission::findOrFail($permissionId);
        $this->editingPermissionId = $permission->id;
        $this->editingPermissionName = $permission->name;
        $this->editingPermissionKey = $permission->key;
        $this->editingPermissionTableName = $permission->table_name;
    }

    public function updatePermission()
    {
        if (!$this->editingPermissionId) return;

        $this->authorize('update', Permission::class);

        $validatedData = $this->validate([
            'editingPermissionName' => 'required|string|max:255',
            'editingPermissionKey' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9_.-]+$/', Rule::unique('permissions', 'key')->ignore($this->editingPermissionId)],
            'editingPermissionTableName' => 'required|string|max:255|regex:/^[a-z_]+$/',
        ]);

        $permission = Permission::findOrFail($this->editingPermissionId);
        $permission->update([
            'name' => $validatedData['editingPermissionName'],
            'key' => $validatedData['editingPermissionKey'],
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
        $this->authorize('delete', Permission::class);

        $permission = Permission::findOrFail($permissionId);
        $permission->roles()->detach();
        $permission->delete();
        session()->flash('success', 'Permission deleted successfully.');
    }

    public function render()
    {
        $this->authorize('viewAny', Permission::class);
        return view('livewire.permissions-management');
    }
}
