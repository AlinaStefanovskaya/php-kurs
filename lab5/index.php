<?php
require 'database.php';
require 'Product.php';
require 'DiscountedProduct.php';
require 'Category.php';

$product1 = new Product("Товар 1", 100, "Опис товару 1");
$product2 = new DiscountedProduct("Товар 2", 200, "Опис товару 2", 20);

$product1->save($mysqli);
$product2->save($mysqli);

$products = Product::getAll($mysqli);

foreach ($products as $product) {
    echo $product->getInfo();
}

$category = new Category("Електроніка");
$category->addProduct($product1);
$category->addProduct($product2);

echo "Категорія: {$category->name}\n";
$category->displayProducts();

$mysqli->close();
?>
