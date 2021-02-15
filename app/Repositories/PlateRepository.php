<?php

namespace App\Repositories;
use App\Models\Plate;

class PlateRepository extends BaseRepository{
    
    public function getModel() {
        return new Plate();
    }

    public function newUser() {
        $Plate = new Plate();
        return $Plate;
    }
    public function findAllByStatus() {
        $Plate = Plate::where('status', '=', 1)->get();
        return $Plate;
    }
}



