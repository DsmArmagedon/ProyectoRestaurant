<?php

namespace App\Managers;

use App\Utils\SimpleImage;

/**
 * BaseManager
 *
 * @author Sergio Antonio Ochoa Martinez<gnu.java.sergio@gmail.com>
 */
abstract class BaseManager {

    const ENABLED = 1;
    const DISABLED = 0;

    protected $model;
    protected $data;
    protected $response;
    protected $validation;

    function __construct($model) {
        $this->model = $model;
    }

    abstract public function getRules();

    public function getCreateRules() {
        return $this->getRules();
    }

    public function getUpdateRules() {
        return $this->getRules();
    }

    public function isValid() {
        if ($this->model->exists) {
            $rules = $this->getUpdateRules();
        } else {
            $rules = $this->getCreateRules();
        }

        $this->validation = \Validator::make($this->data, $rules);

        $isValid = $this->validation->passes();
        //$isValid = $validation->fails();        

        return $isValid;
    }

    public function save() {
        if (!$this->isValid()) {
            return false;
        }

        $this->model->fill($this->data);
        $this->model->save();
        return true;
    }

    public function saveDocument($name) {
        $path = public_path('documents/' . $name);
        if (!is_dir($path)) {
            mkdir($path);
        }
        if ($this->model->document == 1) {
            $fileName = $this->model->title . '.' . $this->model->extension;

            $this->response['document']->move($path, $fileName);
        }
    }

    public function saveImage($folder, $name) {
        $path = public_path($folder . '/' . $name);
        $pathThumb60 = public_path('images/' . $name . '/thumb60/');
        $pathThumb150 = public_path('images/' . $name . '/thumb150/');
        $pathThumb300 = public_path('images/' . $name . '/thumb300/');
        $pathThumb450 = public_path('images/' . $name . '/thumb450/');
        if (!is_dir($folder)) {
            mkdir($folder);
        }
        if (!is_dir($path)) {
            mkdir($path);
        }
        if (!is_dir($pathThumb60)) {
            mkdir($pathThumb60);
        }
        if (!is_dir($pathThumb150)) {
            mkdir($pathThumb150);
        }
        if (!is_dir($pathThumb300)) {
            mkdir($pathThumb300);
        }
        if (!is_dir($pathThumb450)) {
            mkdir($pathThumb450);
        }
        if ($this->model->image == 1) {
            $fileName = $this->model->id . '.' . $this->model->extension;

            $this->response['image']->move($path, $fileName);
            $this->thumb($path, $pathThumb60, $fileName, 60);
            $this->thumb($path, $pathThumb150, $fileName, 150);
            $this->thumb($path, $pathThumb300, $fileName, 300);
            $this->thumb($path, $pathThumb450, $fileName, 450);
        }
    }

    public function thumb($path, $pathThumb, $fileName, $size) {
        $imageThumb = new SimpleImage();
        $imageThumb->load($path . '/' . $fileName);
        $imageThumb->resizeToHeight($size);
        $imageThumb->save($pathThumb . $fileName);
    }

    public function status() {
        if ($this->model->status == self::ENABLED) {
            $this->model->status = self::DISABLED;
            $message = 'Se ha <strong>deshabilitado</strong> el estado correctamente';
        } else {
            $this->model->status = self::ENABLED;
            $message = 'Se ha <strong>habilitado</strong> el estado correctamente';
        }
        $this->model->save();
        return $message;
    }

    public function saveDirect() {
        $this->model->save();
    }

    public function update() {
        $this->model->save();
    }

    public function delete() {
        $this->model->delete();
    }

    function getValidation() {
        return $this->validation;
    }

    function setData($data) {
        $this->response = $data;
        $this->data = array_only($data, array_keys($this->getRules()));
    }

    function getModel() {
        return $this->model;
    }

}
