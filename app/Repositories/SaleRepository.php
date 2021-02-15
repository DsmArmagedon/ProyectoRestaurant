<?php

namespace App\Repositories;
use App\Models\Sale;


class SaleRepository extends BaseRepository{
    

    public function getModel() {
        return new Sale();
    }

    public function newUser() {
        $Sale = new Sale();
        return $Sale;
    }
    public function findAllByStatus() {
        $Sale = Sale::where('status', '=', 1)->get();
        return $Sale;
    }
}



