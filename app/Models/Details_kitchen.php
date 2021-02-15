<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Details_kitchen extends Model
{
    protected $table = 'details_kitchen';
    
    protected $fillable = [
        'kitchen_id',
        'product_id',
        'quantity_kitchen',
        'status'
    ];
    
    public function kitchen() {
        return $this->belongsTo('App\Models\Kitchen');
    }
    
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
    

}
