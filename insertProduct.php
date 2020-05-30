<?php
include("test_con.php");
$productType = $_POST["type"];
$productName = $_POST["productname"];
$price = $_POST["price"];
$price = str_replace(",",".",$price);

$stmt = $db->prepare('INSERT INTO market.product (product_name,type_id,price) VALUES (:prodName,:prodType,:price)');
$stmt->execute(array(
    ':prodType' => $productType,
    ':prodName' => $productName,
    ':price' => $price,
));

header('Location: Purchases.php');
?>