<?php

namespace App\Repositories;
use App\Models\Details_kitchen;


class DetailsKitchenRepository extends BaseRepository{
    

    public function getModel() {
        return new Details_kitchen();
    }

    public function newUser() {
        $Details_kitchen = new Details_kitchen();
        return $Details_kitchen;
    }
    public function findAllByStatus() {
        $Details_kitchen = Details_kitchen::where('status', '=', 1)->get();
        return $Details_kitchen;
    }
}



