<?php

namespace App\Repositories;
use App\Models\Kitchen;


class KitchenRepository extends BaseRepository{
    

    public function getModel() {
        return new Kitchen();
    }

    public function newUser() {
        $Kitchen = new Kitchen();
        return $Kitchen;
    }
    public function findAllByStatus() {
        $Kitchen = Kitchen::where('status', '=', 1)->get();
        return $Kitchen;
    }
}



