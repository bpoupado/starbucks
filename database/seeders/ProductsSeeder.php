<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Latte',
                'slug' => 'latte',
                'category_id' => 1,
                'price' => 3,
                'stock' => 5
            ],
            [
                'name' => 'Mocha',
                'slug' => 'mocha',
                'category_id' => 1,
                'price' => 5.5,
                'stock' => 3
            ],
            [
                'name' => 'Macchiato',
                'slug' => 'macchiato',
                'category_id' => 1,
                'price' => 10,
                'stock' => 2
            ],
            [
                'name' => 'Cappucino',
                'slug' => 'cappucino',
                'category_id' => 1,
                'price' => 7.2,
                'stock' => 10
            ],
            [
                'name' => 'Espresso',
                'slug' => 'espresso',
                'category_id' => 1,
                'price' => 3.5,
                'stock' => 8
            ],
            [
                'name' => 'Filter Coffee',
                'slug' => 'filter-coffee',
                'category_id' => 2,
                'price' => 3.5,
                'stock' => 12
            ],
            [
                'name' => 'Caffe Misto',
                'slug' => 'caffe-misto',
                'category_id' => 2,
                'price' => 5,
                'stock' => 5
            ],
            [
                'name' => 'Mint',
                'slug' => 'mint',
                'category_id' => 3,
                'price' => 3.5,
                'stock' => 50
            ],
            [
                'name' => 'Chamomile Herbal',
                'slug' => 'chamomile-herbal',
                'category_id' => 3,
                'price' => 5.5,
                'stock' => 3
            ],
            [
                'name' => 'Earl Grey',
                'slug' => 'earl-grey',
                'category_id' => 3,
                'price' => 6.2,
                'stock' => 30
            ]
        ]);
    }
}
