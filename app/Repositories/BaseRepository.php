<?php

namespace App\Repositories;

/**
 * BaseRepo
 *
 * @author Sergio Anotnio Ochoa Martinez<gnu.java.sergio@gmail.com>
 */
abstract class BaseRepository {

    protected $model;

    public function __construct() {
        $this->model = $this->getModel();
    }


    public function find($id) {
        return $this->model->find($id);
    }

    public function findOrFail($id) {
        return $this->model->findOrFail($id);
    }
    
    public function all(){
        return $this->model->all();
    }
    
    public function paginate($offset){
        return $this->model->paginate($offset);
    }

}
