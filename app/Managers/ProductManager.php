<?php

namespace App\Managers;

/**
 * UserManager
 *
 * @author Sergio Antonio Ochoa Martinez<gnu.java.sergio@gmail.com>
 */
class ProductManager extends BaseManager {

    protected $rules = array(
        'name'=>'required|unique:products,name',
        'unit' => 'required|alpha',
    );

    public function getUpdateRules() {
        $rules = $this->rules;
        if (isset($rules['name'])) {
            $rules['name'] .= ',' . $this->model->id;
        }
        return $rules;
    }

    public function getRules() {
        return $this->rules;
    }

}
