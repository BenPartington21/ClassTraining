<?php
require_once('dbconfig.php');

$sql = "SELECT productName, quantityInStock, MSRP FROM products ORDER BY productName ASC";

$result = $conn->query($sql);

$products = array();

while($row = $result->fetch_array()){
    //array_push($products,$row);
    $obj = new stdClass();
    $obj->productName = htmlentities($row['productName']);
    $obj->quantityInStock = ($row['quantityInStock']);
    $obj->MSRP = ($row['MSRP']);
    array_push($products,$obj);
    
    
    
    
}

//var_dump($products);

echo json_encode($products);



?>