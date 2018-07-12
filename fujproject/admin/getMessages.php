<?php


$catFilter = $_POST['catFilter'];
$textFilter = $_POST['textFilter'];

//create sql query
$sql = "SELECT * FROM messages, categories WHERE messages.category = categories.category_id";

//check if the admin has selected a specific category
if($catFilter != 'all'){
    $sql .= " AND category = " . $catFilter;
        
}//check if the admin has provided a text filter
if($textFilter != ''){
    $sql .= " AND message LIKE '%" . $textFilter . "%'";
        
}

require_once('../dbconfig.php');

//run the query
$result = $conn->query($sql);

//prepare an array for the response
$messages = array();
while($row = $result->fetch_assoc()){
    array_push($messages, $row);
}//EO While


echo json_encode($messages);


?>