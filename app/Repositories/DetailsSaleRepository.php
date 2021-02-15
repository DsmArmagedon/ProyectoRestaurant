<?php

namespace App\Repositories;
use App\Models\Details_sale;


class DetailsSaleRepository extends BaseRepository{
    

    public function getModel() {
        return new Details_sale();
    }

    public function newUser() {
        $Details_sale = new Details_sale();
        return $Details_sale;
    }
    public function findAllByStatus() {
        $Details_sale = Details_sale::where('status', '=', 1)->get();
        return $Details_sale;
    }
}



