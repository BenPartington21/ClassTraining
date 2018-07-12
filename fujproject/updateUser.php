<?php
//check if the url parameter user_id is set - if it isnt, then redirect the user to the correcr starting point (users.php)
if(!isset($_GET['user_id'])){
    header('location:users.php'); //this redirects to users.php
}

//get the user data from the db
require_once('dbconfig.php');//this provides us with the $conn connection object

//check if form has been posted
if(isset($_GET['f_name'])){
    
    $sql = "UPDATE users SET f_name = '$_GET[f_name]', l_name = '$_GET[l_name]', email = '$_GET[email]' WHERE user_id = $_GET[user_id]";
    
    $conn->query($sql);
}



$sql = "SELECT user_id,f_name,l_name,email FROM users WHERE user_id = " . $_GET['user_id'];
$result = $conn->query($sql);
    
while($row = $result->fetch_array()){
    $f_name = $row['f_name'];
    $l_name = $row['l_name'];
    $email = $row['email'];
    $user_id = $row['user_id'];
}






?>




<?php

//set the title for the page
$title = 'PHP Course - Update User Form';

include 'includes/header.php';

?>

    <div class="container">
        <h1>Update User</h1>
        
        <form>
            
            <div class="form-group">
                <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo $f_name; ?>">
            </div>
               <div class="form-group">
                <label for="l_name">First Name</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo $l_name; ?>">
            </div>
               <div class="form-group">
                <label for="email">First Name</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            </div>
            
            
            
            <input type="hidden" name="user_id" value="<?php echo $user_id;  ?>">
            
            
            <button type="submit" class="btn btn-success">Update User</button>
            
        </form>

        
    </div>

   <?php

include 'includes/footer.php';


    ?>