<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {

    protected $fillable = ['name', 'display_name', 'description', 'status'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    
}
