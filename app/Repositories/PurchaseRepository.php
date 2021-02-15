<?php

namespace App\Repositories;
use App\Models\Purchase;

class PurchaseRepository extends BaseRepository{
    
    public function getModel() {
        return new Purchase();
    }

    public function newUser() {
        $Purchase = new Purchase();
        return $Purchase;
    }
    public function findAllByStatus() {
        $Purchase = Purchase::where('status', '=', 1)->get();
        return $Purchase;
    }
}



