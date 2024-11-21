<?php
require_once 'Product.php';

class DiscountedProduct extends Product {
    public $discount;

    public function __construct($name, $price, $description, $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice() {
        return $this->getPrice() * (1 - $this->discount / 100);
    }

    public function getInfo() {
        $newPrice = $this->getDiscountedPrice();
        return parent::getInfo() . "Знижка: {$this->discount}%\nНова ціна: {$newPrice}\n";
    }
}
?>
