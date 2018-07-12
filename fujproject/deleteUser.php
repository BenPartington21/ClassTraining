<?php
require_once('dbconfig.php');

$sql = "DELETE FROM users WHERE user_id = $_GET[user_id]";

$conn->query($sql);

header('location:users.php');




?>







