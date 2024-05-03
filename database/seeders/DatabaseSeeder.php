<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Productions
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            // PermissionsSeeder::class,



//            UsersPermissionSeeder::class,
//            UpworkProposalPermissionSeeder::class,
//            WorkflowProjectPermissionSeeder::class,
//            WorkflowTaskPermissionSeeder::class,
//            ActivityPermissionSeeder::class,
//            CrmEmployeeSeeder::class,
//            FinanceInvoiceSeeder::class,
//            WorkflowTaskManagerPermissionSeeder::class,
//            RoleSeeder::class,
//            UserSeeder::class,
        ]);
    }
}
