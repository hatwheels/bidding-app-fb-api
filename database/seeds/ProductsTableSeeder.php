<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class)->create([
            'name' => 'Headphones',
            'avatar' => 'http://lorempixel.com/640/480/technics/6/',
        ]);
        factory(\App\Product::class)->create([
            'name' => 'Tablet',
            'avatar' => 'http://lorempixel.com/640/480/technics/1/',
        ]);
        factory(\App\Product::class)->create([
            'name' => 'Laptop',
            'avatar' => 'http://lorempixel.com/640/480/technics/3/',
        ]);
    }
}
