<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'Super Admin']);
        $roleNormalUser = Role::create(['name' => 'Usuario Normal']);

        /**
         * Permisos de transaccion
         */

        Permission::create([
            'name' => 'transactions.index',
            'description' => 'Listado de Transacciones'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'transactions.create',
            'description' => 'Crear Transaccion'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'transactions.edit',
            'description' => 'Editar Transaccion'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'transactions.destroy',
            'description' => 'Eliminar Transaccion'
        ])->syncRoles([]);

        /**
         * Permisos de accounts
         */

        Permission::create([
            'name' => 'accounts.index',
            'description' => 'Listado de Cuentas'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'accounts.create',
            'description' => 'Crear Cuenta'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'accounts.edit',
            'description' => 'Editar Cuenta'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'accounts.destroy',
            'description' => 'Eliminar Cuenta'
        ])->syncRoles([]);

        /**
         * Permisos de accounts
         */

        Permission::create([
            'name' => 'accounts.index',
            'description' => 'Listado de Cuentas'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'accounts.create',
            'description' => 'Crear Cuenta'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'accounts.edit',
            'description' => 'Editar Cuenta'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'accounts.destroy',
            'description' => 'Eliminar Cuenta'
        ])->syncRoles([]);

        /**
         * Permisos de budgets
         */

        Permission::create([
            'name' => 'budgets.index',
            'description' => 'Listado de Budgets'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'budgets.create',
            'description' => 'Crear Budget'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'budgets.edit',
            'description' => 'Editar Budget'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'budgets.destroy',
            'description' => 'Eliminar Budget'
        ])->syncRoles([]);


        /**
         * Permisos de goals
         */

        Permission::create([
            'name' => 'goals.index',
            'description' => 'Listado de Goals'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'goals.create',
            'description' => 'Crear Goals'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'goals.edit',
            'description' => 'Editar Goals'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'goals.destroy',
            'description' => 'Eliminar Goals'
        ])->syncRoles([]);


        /**
         * Permisos de goals
         */

        Permission::create([
            'name' => 'categories.index',
            'description' => 'Listado de Categorias'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'categories.create',
            'description' => 'Crear Categorias'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'categories.edit',
            'description' => 'Editar Categorias'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'categories.destroy',
            'description' => 'Eliminar Categorias'
        ])->syncRoles([]);


        /**
         * Permisos de goals
         */

        Permission::create([
            'name' => 'users.index',
            'description' => 'Listado de Usuarios'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'users.create',
            'description' => 'Crear Usuarios'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'users.edit',
            'description' => 'Editar Usuarios'
        ])->syncRoles([$roleNormalUser]);

        Permission::create([
            'name' => 'users.destroy',
            'description' => 'Eliminar Usuarios'
        ])->syncRoles([]);
    }
}
