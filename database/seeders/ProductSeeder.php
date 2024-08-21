<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create(['code' => 'R01', 'name' => 'Red Widget', 'price' => 32.95]);
        Product::create(['code' => 'G01', 'name' => 'Green Widget', 'price' => 24.95]);
        Product::create(['code' => 'B01', 'name' => 'Blue Widget', 'price' => 7.95]);
    }
}
