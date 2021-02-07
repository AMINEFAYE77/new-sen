<?php

namespace Database\Seeders;

use App\Models\TypeProduct;
use Illuminate\Database\Seeder;

class TypeProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TypeProduct::truncate();
        TypeProduct::create(['libelle'=>'type produit 4']);
        TypeProduct::create(['libelle'=>'type produit 1']);
        TypeProduct::create(['libelle'=>'type produit 2']);
        TypeProduct::create(['libelle'=>'type produit 3']);
    }
}
