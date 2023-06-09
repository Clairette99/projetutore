<?php

namespace Database\Seeders;

use Illuminate\Console\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        //misc
        $miscPermission = Permission::create (['name' => 'N/A']);

        //USER MODEL
        $userPermission1 = Permission::create (['name' => 'create: user']);
        $userPermission2 = Permission::create (['name' => 'read: user']);
        $userPermission3 = Permission::create (['name' => 'update: user']);
        $userPermission4 = Permission::create (['name' => 'delete: user']);

         //ROLE MODEL 
         $rolePermission1 = Permission::create (['name' => 'create: role']);
         $rolePermission2 = Permission::create (['name' => 'read: role']);
         $rolePermission3 = Permission::create (['name' => 'update: role']);
         $rolePermission4 = Permission::create (['name' => 'delete: role']);

         //PERMISSION MODEL
         $Permission1 = Permission::create (['name' => 'create: permission']);
         $Permission2 = Permission::create (['name' => 'read: permission']);
         $Permission3 = Permission::create (['name' => 'update: permission']);
         $Permission4 = Permission::create (['name' => 'delete: permission']);

         //ADMINS
         $adminPermission1 = Permission::create (['name' => 'read: admin']);
         $adminPermission2 = Permission::create (['name' => 'update: admin']);

         //CREATE ROLES
         $userRole = Role::create(['name' => 'user'])->syncPermissions ([
            $miscPermission,
         ]);

         $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4,
            $adminPermission1,
            $adminPermission2,
            
         ]);
        
        // $moderatorRole = Role::create(['name' => 'moderator'])->syncPermissions([
          //  $userPermission2,
           //// $Permission2,
           // $adminPermission1,
        // ]);

       //  $developerRole = Role::create(['name' => 'developer'])->syncPermissions([
         //   $adminPermission1,
        // ]);
        
        // User::create ([
         //   'name' => 'super admin',
          //  'is_admin' => 1,
          //  'email' => 'super@admin.com',
           // 'email_verified_at' => now(),
           // 'password' => Hash::make('password'),
           // 'remenber_token' => Str::random(10),
         //])->assignRole($superAdminRole);

         User::create ([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remenber_token' => Str::random(10),
         ])->assignRole($adminRole);

         //User::create ([
          //  'name' => 'moderator',
          //  'is_admin' => 1,
          //  'email' => 'moderator@admin.com',
          //  'email_verified_at' => now(),
          //  'password' => Hash::make('password'),
          //  'remenber_token' => Str::random(10),
         //])->assignRole($moderatorRole);

        // User::create ([
          //  'name' => 'developer',
           // 'is_admin' => 1,
           // 'email' => 'developer@admin.com',
           // 'email_verified_at' => now(),
            //'password' => Hash::make('password'),
            //'remenber_token' => Str::random(10),
         //])->assignRole($developerRole);

        for ($i=1; $i <50; $i++) {
            User::create ([
                'name' => 'Test' .$i,
                'is_admin' => 0,
                'email' => 'test'.$i.'@test.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),//password
                'remenber_token' => Str::random(10),

             ])->assignRole($userRole);

         //}
         
    }
}
