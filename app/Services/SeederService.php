<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SeederService
{
    public function createPermissions(string $group, array $actions): void
    {
        foreach ($actions as $action) :
            Permission::create(['name' => $action . ': ' . $group]);
        endforeach;
    }

    public function assignPermissionToRole(string $role, string $group, array $actions): void
    {
        $role = Role::findByName($role);
        foreach ($actions as $action) :
            $role->givePermissionTo($action . ': ' . $group);
        endforeach;
    }
}
