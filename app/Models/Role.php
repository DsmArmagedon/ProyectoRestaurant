<?php 
namespace App\Models;
 
use Zizaco\Entrust\EntrustRole;
 
class Role extends EntrustRole
{
   protected $fillable = [
        'name',
        'display_name',
        'description',
        'status'
    ];
    
   public function user(){
        return $this->belongsToMany('App\Models\User');
    }
    
    public function permission() {
        return $this->belongsToMany('App\Models\Permission');
    }
}