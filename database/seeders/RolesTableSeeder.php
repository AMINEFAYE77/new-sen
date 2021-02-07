<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::truncate();
        Role::create(['libelle'=>'admin']);
        Role::create(['libelle'=>'niveau 1']);
        Role::create(['libelle'=>'niveau 2']);
        Role::create(['libelle'=>'niveau 3']);
    }
}
