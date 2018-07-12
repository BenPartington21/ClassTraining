<?php
require_once('dbconfig.php');

$sql = "DELETE FROM categories WHERE category_id = $_GET[category_id]";

$conn->query($sql);

header('location:categories.php');




?>







