<?php

class DataBase {

    private array $store = [];
    
    public function getStore() {
        return $this->store;
    }

    public function setStore($user) {
        $this->store[$user->getCardNumber()] = $user;
    }

    public function getUser($id) {
        return $this->store[$id];
    }
}