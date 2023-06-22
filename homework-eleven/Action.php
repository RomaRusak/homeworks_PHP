<?php

class Action {
    public string $type;
    public $cash = 0;

    public function __construct($type, $cash) {
        $this->init($type, $cash);
    }

    private function init($type, $cash) {

       $this->setType($type);
       $this->setCash($cash);
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setCash($cash) {
        $this->cash = $cash;
    }
}