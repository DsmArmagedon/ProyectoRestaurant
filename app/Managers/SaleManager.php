<?php

namespace App\Managers;

/**
 * UserManager
 *
 * @author Sergio Antonio Ochoa Martinez<gnu.java.sergio@gmail.com>
 */
class SaleManager extends BaseManager {

    protected $rules = array(
        'date_sale'=>'required',
        'number_table' => 'required',
        'user_id'=>'required',
        'total'=>'required'
    );

    public function getRules() {
        return $this->rules;
    }

}
