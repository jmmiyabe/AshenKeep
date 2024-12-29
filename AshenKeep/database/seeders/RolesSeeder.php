<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role_admin = Role::create(['name' => 'Admin']);
        $role_office_staff = Role::create(['name' => 'Office Staff']);
        $role_finance_staff = Role::create(['name' => 'Finance Staff']);
        $role_applicant = Role::create(['name' => 'Applicant']);

        $permission_review_requirements = Permission::create(['name' => 'Review Requirements']);
        $permission_vaults = Permission::create(['name' => 'Vaults']);
        $permission_manage_applications = Permission::create(['name' => 'Manage Applications']);
        $permission_manage_requirements = Permission::create(['name' => 'Manage Requirements']);
        $permission_manage_donations = Permission::create(['name' => 'Manage Donations']);
        $permission_apply = Permission::create(['name' => 'Apply']);
        $permission_donate = Permission::create(['name' => 'Donate']);
        $permission_view_vaults = Permission::create(['name' => 'View Vaults']);

        $permissions_admin = [$permission_review_requirements, $permission_vaults];
        $permissions_office_staff = [$permission_manage_applications, $permission_manage_requirements];
        $permissions_applicant = [$permission_apply, $permission_donate, $permission_view_vaults];

        $role_admin->syncPermissions($permissions_admin);
        $role_office_staff->syncPermissions($permissions_office_staff);
        $role_finance_staff->givePermissionTo($permission_manage_donations);
        $role_applicant->syncPermissions($permissions_applicant);
    }
}