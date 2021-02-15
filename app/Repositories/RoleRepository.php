<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends BaseRepository {

    public function getModel() {
        return new Role();
    }

    public function newRole() {
        $role = new Role();
        return $role;
    }

    public function findAllByStatusActive() {
        $roles = Role::where('status', '=', 1)->get();
        return $roles;
    }

}
