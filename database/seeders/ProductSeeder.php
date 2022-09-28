<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsCount = max((int)$this->command->ask("How many products would you like ?", 5), 1);
        // products
        Product::factory($productsCount)->make()->each(function($product){
            $position = Product::max('position') + 1;
            $product->position = $position;
            $product->save();
        });
    }
}