<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index');
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $position = Product::max('position') + 1;
        // dd($position);
        $product = Product::create($request->validated() + ['position' => $position]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $product->image()->save(
                Image::create([
                    'path' => $path,
                    'product_id' => $product->id
                ])
            );
        }
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');

            if ($product->image) {
                Storage::delete($product->image->path);
                $product->image->path = $path;
                $product->image->save();
            } else {
                $product->image()->save(
                    Image::create([
                        'path' => $path,
                        'product_id' => $product->id
                    ])
                );
            }
        }

        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    public function destroy(Product $product): RedirectResponse
    {
        /**
         * position decrement all above products
         * softDeletes Product
         * Delet Image from Storage & db table
         */
        Product::where('position', '>', $product->position)->decrement('position', 1);
        $product->delete();
        Storage::delete($product->image->path);
        $product->image->delete();

        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}