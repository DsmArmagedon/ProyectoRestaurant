<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository extends BaseRepository{
    
    public function getModel() {
        return new User();
    }

    public function newUser() {
        $user = new User();
        return $user;
    }
    public function findAllByStatus() {
        $users = User::where('status', '=', 1)->get();
        return $users;
    }
}



