<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Details_sale extends Model
{
    protected $table = 'details_sale';
    
    protected $fillable = [
        'sale_id',
        'plate_id',
        'quantity',
        'price_unit',
        'status'
    ];
    
    public function sale() {
        return $this->belongsTo('App\Models\Sale');
    }
    
    public function plate() {
        return $this->belongsTo('App\Models\Plate');
    }

}
