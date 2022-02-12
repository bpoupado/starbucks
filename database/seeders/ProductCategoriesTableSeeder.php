<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'name' => 'Espresso Drinks',
                'slug' => 'espresso-drinks'
            ],
            [
                'name' => 'Brewed Coffee',
                'slug' => 'brewed-coffee'
            ],
            [
                'name' => 'Tea',
                'slug' => 'tea'
            ],
        ]);
    }
}
