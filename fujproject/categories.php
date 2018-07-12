<?php
//insert user into the database

//step 1 - connect to the database
require_once('dbconfig.php');

//set the title for the page
$title = 'PHP Course - Categories';

include 'includes/header.php';

?>

        <div class="container">

            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
               $sql = "SELECT * FROM categories";
               $result = $conn->query($sql);
               //for dev purposes
               //var_dump($result);
               
               
               //loop thru the resultsand display the html table
               while($row= $result->fetch_array()){
                   echo '<tr>';
                   echo '<td>' . $row['category_label'] . '</td>';
                   echo '<td><a href="deleteCategory.php?user_id='. $row['category_id'].'">Update</a></td>';
                   echo '<td><a class="deleteCategoryLink" href="deleteCategory.php?category_id='. $row['category_id'].'">Delete</a></td>';
                   echo '</tr>';
               }
               
               
               ?>
                </tbody>


            </table>

            <script>
                $(document).ready(function(){
                    
                    //listen for the userclicking a deleteUserLink 
                    
                    $('.deleteCategoryLink').click(function(e){
                        e.preventDefault();//stop browser performing default behaviour
                        var yes = confirm('Are you sure you want to delete this category?');
                        
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
