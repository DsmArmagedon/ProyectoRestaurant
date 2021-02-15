<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    protected $table = 'kitchens';
    
    protected $fillable = [
        'user_id',
        'plate_id',
        'date_kitchen',
        'existence_plate',
        'status'
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function plate() {
        return $this->belongsTo('App\Models\Plate');
    }
    public function details_kitchen() {
        return $this->hasMany('App\Models\Details_kitchen');
    }
}
