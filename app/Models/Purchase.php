<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';
    
    protected $fillable = [
        'quantity',
        'product_id',
        'date_purchase',
        'status'
    ];
    
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
