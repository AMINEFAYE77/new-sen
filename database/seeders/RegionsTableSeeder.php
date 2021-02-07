<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::truncate();
        Region::create(['libelle'=>'Dakar']);
        Region::create(['libelle'=>'Ziguinchor']);
        Region::create(['libelle'=>'Diourbel']);
        Region::create(['libelle'=>'Saint-Louis']);
        Region::create(['libelle'=>'Tambacounda	']);
        Region::create(['libelle'=>'Kaolack']);
        Region::create(['libelle'=>'Thiès']);
        Region::create(['libelle'=>'Louga']);
        Region::create(['libelle'=>'Fatick']);
        Region::create(['libelle'=>'Kolda']);
        Region::create(['libelle'=>'Matam']);
        Region::create(['libelle'=>'Kédougou']);
        Region::create(['libelle'=>'Sédhiou']);


    }
}
