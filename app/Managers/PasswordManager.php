<?php

namespace App\Managers;

/**
 * UserManager
 *
 * @author Sergio Antonio Ochoa Martinez<gnu.java.sergio@gmail.com>
 */
class PasswordManager extends BaseManager {

    protected $rules = array(
        'name'=>'required',
        'password' => 'min:6',
        'checkPassword' => 'same:password'
    );
    public function getUpdateRules() {
        $rules = $this->rules;
        return $rules;
    }

    public function getRules() {
        return $this->rules;
    }

}