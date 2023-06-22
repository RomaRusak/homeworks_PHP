<?php

require_once "./Action.php";

class User {
    private string $cardNumber;
    private string $pinCode;
    private $cash;

    public function __construct($hardcoded)   { //Подложил себе сам свинью и все пользователи у меня создаются с рандомными пинкодами, номерами и балансом, тут костыль, что бы захардкодить одного друга и и на нем тестировать свой код)
        !$hardcoded ? $this->init() : $this->createHardcodedBrother();
    }

    private function createHardcodedBrother() {
        $this->cardNumber = '1111 2222 3333 4444';
        $this->pinCode = '123456';
        $this->cash = 100.15;
    }

    private function init() {
        $this->cardNumberGenerate();
        $this->pindCodeGenerate();
        $this->cashGenerate();
    }

    private function cardNumberGenerate() {
        $cardNumber = '';
        $blocks = 4;

        for($i = 0; $i < $blocks; $i++) {
            for($j = 0; $j < 4; $j++) {
                $cardNumber .= rand(0,9);
            }

            if ($i < $blocks - 1) $cardNumber .= ' ';
        }

        $this->setCardNumber($cardNumber);
    }

    private function pindCodeGenerate() {
        $pinCode = '';
        $counter = 4;

        for($i = 0; $i < $counter; $i++) {
            $pinCode .= rand(0,9);
        }

        $this->setPinCode($pinCode);
    }

    private function cashGenerate() {
        $cash = rand(0, 10000) + rand(0, 99) / 100;
        $this->setCash(new Action('inc', $cash));
    }

    public function getCardNumber() {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function getPinCode() {
        return $this->pinCode;
    }

    public function setPinCode($pinCode) {
        $this->pinCode = $pinCode;
    }

    public function getCash() {
        return $this->cash;
    }

    public function setCash($action) {
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