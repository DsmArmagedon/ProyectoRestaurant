<?php

namespace App\Managers;

/**
 * UserManager
 *
 * @author Sergio Antonio Ochoa Martinez<gnu.java.sergio@gmail.com>
 */
class UserManager extends BaseManager {

    protected $rules = array(
        'name'=>'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'username'=>'required|unique:users,username',
        'ci'=>'required|unique:users,ci',
        'password' => 'min:6',
        'checkPassword' => 'same:password'
    );

    public function getUpdateRules() {
        $rules = $this->rules;
        if (isset($rules['email'])) {
            $rules['email'] .= ',' . $this->model->id;
        }
        if (isset($rules['username'])) {
            $rules['username'] .= ',' . $this->model->id;
        }
        if (isset($rules['ci'])) {
            $rules['ci'] .= ',' . $this->model->id;
        }
        return $rules;
    }

    public function getRules() {
        return $this->rules;
    }

}
