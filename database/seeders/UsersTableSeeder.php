<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
       $adminRoles = Role::where('libelle','admin')->first();
       $Niveau1Roles = Role::where('libelle','niveau 1')->first();
       $Niveau2Roles = Role::where('libelle','niveau 2')->first();
       $Niveau3Roles = Role::where('libelle','niveau 3')->first();


       $admin = User::create([
          'name'=>'admin',
          'email'=>'admin@admin.com',
          'password'=>bcrypt('771278867'),
       ]);
        $niveau1 = User::create([
            'name'=>'niveau1',
            'email'=>'niveau1@niveau1.com',
            'password'=>bcrypt('niveau1'),
        ]);
        $niveau2 = User::create([
            'name'=>'niveau2',
            'email'=>'niveau2@niveau2.com',
            'password'=>bcrypt('niveau2'),
        ]);
        $niveau3 = User::create([
            'name'=>'niveau3',
            'email'=>'niveau3@niveau3.com',
            'password'=>bcrypt('niveau3'),
        ]);

        $admin->roles()->attach($adminRoles);
        $niveau1->roles()->attach($Niveau1Roles);
        $niveau2->roles()->attach($Niveau2Roles);
        $niveau3->roles()->attach($Niveau3Roles);

    }
}
