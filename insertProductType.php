<?php
include("test_con.php");
$productType = $_POST["type"];
$percentTax = $_POST["percent_tax"];
$percentTax = str_replace(",",".",$percentTax);

$stmt = $db->prepare('INSERT INTO market.product_type (type,tax_amount) VALUES (:prodType,:pctg)');
$stmt->execute(array(
    ':prodType' => $productType,
    ':pctg' => $percentTax,
));

header('Location: AddProduct.php');
?>