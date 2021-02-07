<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Seeder;

class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commune::truncate();
        Commune::create(['libelle'=>'Dakar']);
        Commune::create(['libelle'=>'Ziguinchor']);
        Commune::create(['libelle'=>'Diourbel']);
        Commune::create(['libelle'=>'Saint-Louis']);
        Commune::create(['libelle'=>'Tambacounda	']);
        Commune::create(['libelle'=>'Kaolack']);
        Commune::create(['libelle'=>'Thiès']);
        Commune::create(['libelle'=>'Louga']);
        Commune::create(['libelle'=>'Fatick']);
        Commune::create(['libelle'=>'Kolda']);
        Commune::create(['libelle'=>'Matam']);
        Commune::create(['libelle'=>'Kédougou']);
        Commune::create(['libelle'=>'Sédhiou']);
        Commune::create(['libelle'=>'Bakel']);
        Commune::create(['libelle'=>'Bambey']);
        Commune::create(['libelle'=>'Bignona']);
        Commune::create(['libelle'=>'Foundiougne']);
        Commune::create(['libelle'=>'Dagana']);
        Commune::create(['libelle'=>'Gossas']);
        Commune::create(['libelle'=>'Guinguinéo']);
        Commune::create(['libelle'=>'Joal-Fadiouth']);
        Commune::create(['libelle'=>'Kaffrine']);
        Commune::create(['libelle'=>'Kébémer']);
        Commune::create(['libelle'=>'Khombole']);
        Commune::create(['libelle'=>'Linguère']);
        Commune::create(['libelle'=>'Mbacké']);
        Commune::create(['libelle'=>'Mbour']);
        Commune::create(['libelle'=>'Meckhé']);
        Commune::create(['libelle'=>'Nioro du Rip']);
        Commune::create(['libelle'=>'Oussouye']);
        Commune::create(['libelle'=>'Podor']);
        Commune::create(['libelle'=>'Tivaouane']);
        Commune::create(['libelle'=>'Vélingara ']);
    }
}
