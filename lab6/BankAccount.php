<?php

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;
    
    protected $balance;
    protected $currency;
    
    public function __construct($currency, $balance = 0) {
        if ($balance < self::MIN_BALANCE) {
            throw new Exception("Баланс не може бути менше " . self::MIN_BALANCE);
        }
        $this->currency = $currency;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення має бути позитивною.");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття має бути позитивною.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів на рахунку.");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getCurrency() {
        return $this->currency;
    }
}
?>
