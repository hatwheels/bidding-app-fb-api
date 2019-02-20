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
            'avatar' => 'product/avatars/headphones.jpg',
        ]);
        factory(\App\Product::class)->create([
            'name' => 'Tablet',
            'avatar' => 'product/avatars/tablet.jpg',
        ]);
        factory(\App\Product::class)->create([
            'name' => 'Laptop',
            'avatar' => 'product/avatars/laptop.jpg',
        ]);
    }
}
