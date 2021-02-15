<?php

namespace App\Managers;

/**
 * UserManager
 *
 * @author Sergio Antonio Ochoa Martinez<gnu.java.sergio@gmail.com>
 */
class KitchenManager extends BaseManager {

    protected $rules = array(
        'date_kitchen'=>'required',
        'existence_plate' => 'required',
        'user_id'=>'required',
        'plate_id'=>'required'
    );

    public function getRules() {
        return $this->rules;
    }

}
