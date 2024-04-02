<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    
    public function run()
    {
       $role1 = Role::create(['name' => 'Admin']);
       $role2 = Role::create(['name' => 'Docente']);
       $role3 = Role::create(['name' => 'PC']);
       $role4 = Role::create(['name' => 'Estudiante']);

        Permission::create(['name' => 'users.index'])->assignRole($role1);
        Permission::create(['name' => 'users.create'])->assignRole($role1);
        Permission::create(['name' => 'users.edit'])->assignRole($role1);
        Permission::create(['name' => 'users.destroy'])->assignRole($role1);

        Permission::create(['name' => 'institucions.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'institucions.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'institucions.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'institucions.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'cursos.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'cursos.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'cursos.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'cursos.destroy'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'cursos.view'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'certificados.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'certificados.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'certificados.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'certificados.destroy'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'certificados.view'])->syncRoles([$role1, $role2, $role3, $role4]);
    }
}
