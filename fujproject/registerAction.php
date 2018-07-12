<?php
//insert user into the database

//step 1 - connect to the database
require_once('dbconfig.php');

//get current date for date_reg in DB
$now = date('r');
$role = 'pleb';
//-------------------------------------------Works, but insecure
// insert the user into the database     SQL (Structured Query language)

//$sql = "INSERT INTO users (f_name, l_name, email, password, date_reg) 
//VALUES('$_POST[f_name]','$_POST[l_name]','$_POST[email]','$_POST[password]','$now')";



//echo $sql;
//$conn->query($sql);
//-------------------------------------------




//---- it is more secure to use prepared statements--------------------

$stmt = $conn->prepare("INSERT INTO users(f_name,l_name,email,password,date_reg,role) VALUES(?,?,?,?,?,?)");
$stmt->bind_param('ssssss',$_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['password'],$now,$role);
$stmt->execute();







?>




    <?php

//set the title for the page
$title = 'PHP Course - Sign In Page';

include 'includes/header.php';

?>

        <div class="container">

            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
               $sql = "SELECT f_name,l_name,email,role FROM users";
               $result = $conn->query($sql);
               //for dev purposes
               //var_dump($result);
               
               
               //loop thru the resultsand display the html table
               while($row= $result->fetch_array()){
                   echo '<tr>';
                   echo '<td>' . $row['f_name'] . '</td>';
                   echo '<td>' . $row['l_name'] . '</td>';
                   echo '<td>' . $row['email'] . '</td>';
                   echo '<td>' . $row['role'] . '</td>';
                   echo '</tr>';
               }
               
               
               ?>
                </tbody>


            </table>





        </div>

        <?php

include 'includes/footer.php';


    ?>
