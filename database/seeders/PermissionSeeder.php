<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Services\SeederService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private string $group;

    public function __construct(
        readonly private SeederService $service,
    )
    {
        $this->group = 'permission';
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'N/A']);

        $actions = ['read-any','create','edit','update','delete','restore','force-delete'];
        $this->service->createPermissions($this->group, $actions);
        $this->service->assignPermissionToRole(RoleEnum::ADMINISTRATOR->value, $this->group, $actions);
    }
}
