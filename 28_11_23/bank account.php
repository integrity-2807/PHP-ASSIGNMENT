<?php

class BankAccount {
    private $user;
    private $balance;

    public function __construct($user, $initial_balance = 0) {
        $this->user = $user;
        $this->balance = $initial_balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited $".$amount.". New balance: $".$this->balance."\n";
        } else {
            echo "Invalid deposit amount. Please deposit a positive amount.\n";
        }
        echo "<br>";
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrew $".$amount.". New balance: $".$this->balance."\n";
        } else {
            echo "Invalid withdrawal amount. Please enter a valid amount.\n";
        }
        echo "<br>";
    }

    public function displayBalance() {
        echo "User: ".$this->user.", Balance: $".$this->balance."\n";
        echo "<br>";
    }
}


$account1 = new BankAccount("John Doe", 1000);
$account1->displayBalance();  

$account1->deposit(900);      
$account1->withdraw(500);     

$account1->displayBalance();  
  


?>
