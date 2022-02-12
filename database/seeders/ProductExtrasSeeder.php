<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductExtrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_extras')->insert([
            [
                'name' => 'Cinnamon',
                'slug' => 'cinnamon',
                'price' => 0.5,
                'stock' => 5
            ],
            [
                'name' => 'Yellow Sugar',
                'slug' => 'yellow-sugar',
                'price' => 0.20,
                'stock' => 3
            ],
            [
                'name' => 'Syrup',
                'slug' => 'syrup',
                'price' => 0.25,
                'stock' => 6
            ],
            [
                'name' => 'Whipped Cream',
                'slug' => 'whipped-cream',
                'price' => 0.75,
                'stock' => 10
            ]
        ]);
    }
}
