<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    
    protected $fillable = [
        'user_id',
        'number_table',
        'date_sale',
        'total',
        'status',
        'description'
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
        public function details_sale() {
        return $this->hasMany('App\Models\Details_sale');
    }
}
