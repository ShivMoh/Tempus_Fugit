<?php
class CashRegister {
    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function selectItems($items) {
        // Code to select menu items for a sale
    }

    function calculatePrice($items) {
        // Code to calculate the price of the selected items
    }

    function applyDiscount($sale, $discount) {
        // Code to apply a discount to a sale
    }

    function printBill($sale) {
        // Code to print a bill for a sale
    }
}

?>