<?php

$conn = new mysqli('localhost','fuj2-admin','password','fuj2');
//check if not connected OK
if($conn->connect_error){
    echo 'Connection Error: ' . $conn->connect_error;
    exit();
}












?>