<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $table = 'plates';
    
    protected $fillable = [
        'name',
        'price',
        'existence',
        'status'
    ];
    
    public function kitchen() {
        return $this->hasMany('App\Models\Kitchen');
    }
}
