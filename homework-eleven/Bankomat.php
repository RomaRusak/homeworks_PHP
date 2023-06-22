<?php

require_once "./Action.php";

class Bankomat {
     private bool $withoutFaults = true;
     private int $cash = 4000;
     private bool $hasCard = false;
     private  $currentUser;
     private bool $validation = false;

     public function getCard($cardNumber, $dataBase) {
        $this->hasCard = true;

        if ($this->withoutFaults) {
            $currentUser = $dataBase->getUser($cardNumber);
            $this->setCurrentUser($currentUser);
        } else echo 'Банкомат не работает по техническим причинам';
     }

     public function insertPassword($pinCode) {
        if ($this->checkPassword($pinCode, $this->currentUser->getPinCode())) {
            $this->setValidation(true);
        } else {
            echo 'вы ввели неверный пароль';
        };
     }

     public function showBallance() {
        if ($this->currentUser && $this->validation) {
            return $this->currentUser->getCash();
        }
     }

     public function topUpBallance($cash) {
        if ($this->currentUser && $this->validation) {
            $this->currentUser->setCash(new Action('inc', $cash));
            $this->setCash(new Action('inc', $cash));
        }
     }

     public function downUpBallance($cash) {
        if ($this->currentUser && $this->validation) {
            if ($this->currentUser->getCash() - $cash >= 0) {
                if ($this->cash >= $cash) {

                    $money = $this->currentUser->setCash(new Action('dec', $cash));
                    $this->setCash(new Action('dec', $cash));
                    return $money;

                } else echo 'Недостаточно наличных средств в банкомате';
            } else echo 'На балансе недостаточно средств';
        }
     }

     public function giveCard() {
        $this->setCurrentUser(null);
     }

     private function setCurrentUser($currentUser) {
        $this->currentUser = $currentUser;
     }

     private function checkPassword ($introducedPassword, $truePassword){
        return $introducedPassword === $truePassword; 
     }

     private function setValidation($boolVal) {
        $this->validation = $boolVal;
     }

     private function setCash($action) {
        switch ($action->type) {
            case 'inc':
                $this->cash += $action->cash;
            break;
            case 'dec':
                $this->cash -= $action->cash;
            break;
            default:
            break;
        }
     }
}