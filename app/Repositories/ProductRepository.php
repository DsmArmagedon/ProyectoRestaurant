<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository extends BaseRepository{
    
    public function getModel() {
        return new Product();
    }

    public function newUser() {
        $Product = new Product();
        return $Product;
    }
    public function findAllByStatus() {
        $Product = Product::where('status', '=', 1)->get();
        return $Product;
    }
}



