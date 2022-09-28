<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsTable extends Component
{
    public function render()
    {
        $products = Product::latest()->orderBy('position')->paginate(10);
        return view('livewire.products-table', compact('products'));
    }

    public function updateProductOrder($products)
    {
        // dd($products);
        foreach ($products as $product) {
            Product::find($product['value'])->update(['position' => $product['order']]);
        }
    }
}