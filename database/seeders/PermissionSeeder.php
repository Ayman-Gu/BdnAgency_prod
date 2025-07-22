<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            'users' => 'Utilisateurs',
            'roles' => 'Rôles',
            'permissions' => 'Permissions',
            'posts' => 'Articles',
            'settings' => 'Paramètres',
        ];

        $actions = [
            'all' => 'Tout',
            'read' => 'Lire',
            'create' => 'Ajouter',
            'update' => 'Modifier',
            'delete' => 'Supprimer',
        ];

        foreach ($modules as $table => $display) {
            foreach ($actions as $key => $label) {
                Permission::firstOrCreate([
                    'key' => "{$table}.{$key}",
                ], [
                    'name' => "{$label} {$display}",
                    'table_name' => $table,
                ]);
            }
        }
    }
}