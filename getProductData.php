<?php
include("test_con.php");
$data = json_decode(file_get_contents("php://input"));
$productId = $data->idProduct;

foreach($db->query("SELECT product.product_name,product.price,
product_type.type,product_type.tax_amount 
FROM market.product,market.product_type 
WHERE market.product.type_id =  market.product_type.id 
AND market.product.id = $productId") as $row) { 

    $collectedData[] = array(
        'productName'=> $row['product_name'],
        'type'=> $row['type'],
        'taxAmount'=> $row['tax_amount'],
        'price'=> $row['price'],
    );
}

echo(json_encode(array("response"=>$collectedData)));
?>