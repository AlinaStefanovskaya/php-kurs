<?php

require_once 'AccountInterface.php';
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

try {
    $account1 = new BankAccount("USD", 1000);
    echo "Баланс рахунку 1: " . $account1->getBalance() . " " . $account1->getCurrency() . "\n";
  
    $account1->deposit(500);
    echo "Баланс рахунку після поповнення: " . $account1->getBalance() . " " . $account1->getCurrency() . "\n";
   
    $account1->withdraw(300);
    echo "Баланс рахунку після зняття: " . $account1->getBalance() . " " . $account1->getCurrency() . "\n";
 
    $account2 = new SavingsAccount("EUR", 2000);
    echo "\n Баланс накопичувального рахунку: " . $account2->getBalance() . " " . $account2->getCurrency() . "\n";

    $account2->applyInterest();
    echo "Баланс після застосування відсотків: " . $account2->getBalance() . " " . $account2->getCurrency() . "\n";
 
    $account2->withdraw(3000);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}

?>
