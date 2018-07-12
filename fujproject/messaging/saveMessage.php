<?php

$email = $_POST['email'];
$category = $_POST['category'];
$message = $_POST['message'];


//now saveMessage

require_once('../dbconfig.php');

$now = date('r');

$stmt = $conn->prepare("INSERT INTO messages(category,message,email,date) VALUES(?,?,?,?)");
$stmt->bind_param('isss',$category,$message,$email,$now);
$stmt->execute();

echo 'done';





//echo 'We have recieved your message. Thanks!';

    
    
?>