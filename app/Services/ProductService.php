<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{

    // without caching
    public function get($request)
    {
        return Product::whereFilter($request)->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }
}
