<?php
class Product {
    public $name;
    public $description;
    protected $price;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    public function setPrice($price) {
        if ($price < 0) {
            throw new Exception("Ціна не може бути від'ємною.");
        }
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInfo() {
        return "Назва: {$this->name}\n Ціна: {$this->getPrice()}\n Опис: {$this->description}\n";
    }

    public function save($mysqli) {
        $stmt = $mysqli->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $this->name, $this->price, $this->description);
        $stmt->execute();
        $stmt->close();
    }

    public static function getAll($mysqli) {
        $result = $mysqli->query("SELECT * FROM products");
        $products = [];

        while ($row = $result->fetch_assoc()) {
            $product = new Product($row['name'], $row['price'], $row['description']);
            $products[] = $product;
        }

        return $products;
    }
}
?>
