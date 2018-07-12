<?php
//insert user into the database

//step 1 - connect to the database
require_once('dbconfig.php');

//set the title for the page
$title = 'PHP Course - Registered Users';

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
               $sql = "SELECT f_name,l_name,email,user_id,role FROM users";
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
                   echo '<td><a href="updateUser.php?user_id='. $row['user_id'].'">Update</a></td>';
                   echo '<td><a class="deleteUserLink" href="deleteUser.php?user_id='. $row['user_id'].'">Delete</a></td>';
                   echo '</tr>';
               }
               
               
               ?>
                </tbody>


            </table>

            <script>
                $(document).ready(function(){
                    
                    //listen for the userclicking a deleteUserLink 
                    
                    $('.deleteUserLink').click(function(e){
                        e.preventDefault();//stop browser performing default behaviour
                        var yes = confirm('Are you sure you want to delete this user?');
                        
                       if(yes){
                           //console.log(e.target.href);
                           window.location = e.target.href; //redirect to delete page
                       }
                        
                        
                        
                    });
                })
                
            
            
            
            </script>



        </div>

        <?php

include 'includes/footer.php';


    ?>
