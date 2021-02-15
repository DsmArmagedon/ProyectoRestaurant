<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'name',
        'existence',
        'unit',
        'status'
    ];
    
    public function purchase() {
        return $this->hasMany('App\Models\Purchase');
    }
    
    public function details_kitchen() {
        return $this->hasMany('App\Models\Details_kitchen');
    }
}
