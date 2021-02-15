<?php

namespace App\Managers;

/**
 * UserManager
 *
 * @author Sergio Antonio Ochoa Martinez<gnu.java.sergio@gmail.com>
 */
class PurchaseManager extends BaseManager {

    protected $rules = array(
        'date_purchase'=>'required',
        'quantity' => 'required|integer',
        'product_id'=>'required'
    );

    public function getRules() {
        return $this->rules;
    }

}
