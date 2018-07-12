<?php

$email = $_POST['email'];
$password = $_POST['password'];


require_once('dbconfig.php');

$sql = "SELECT f_name,role FROM users WHERE email = '$email' AND password = '$password'";


$result = $conn->query($sql);

$user = array();
while($row = $result->fetch_assoc()){
    array_push($user, $row);
}


echo json_encode($user);


?>