<?php

class SavingsAccount extends BankAccount {
    public static $interestRate = 0.05;
    
    public function applyInterest() {
        $this->balance += $this->balance * self::$interestRate;
    }
}
?>
