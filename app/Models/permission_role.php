<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permission_role extends model {

    protected $fillable = ['permission_id', 'role_id'];

    public function permission() {
        return $this->hasMany('App\Models\Permission');
    }

}
