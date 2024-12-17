<?php

namespace app\models;

class ModelException extends \Exception { 

    public function __construct($message) {
        parent::__construct($message);
    }

}