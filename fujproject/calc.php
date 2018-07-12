<?php

//set the title for the page
$title = 'PHP Course - VAT Calculator';

include 'includes/header.php';

?>

    <div class="container">
        
        <h1>VAT Calculator</h1>
        
        <form>
            
            <div class="form-group">
                <label>Amount</label>
                <input type="text" name="amount"
                class="form-control" 
                
                <?php
                  if(isset($_GET['amount'])){
                      echo ' value="'  .  $_GET['amount'] . '"';
                  }     
                 ?>
                 
                 
                
                >
            <!--end of amount input-->
            </div>
               <div class="form-group">
                <label>Rate</label>
                <input type="text" name="rate"
                class="form-control"
   
                
               <?php
                  if(isset($_GET['rate'])){
                      echo ' value="'  .  $_GET['rate'] . '"';
                  }     
                 ?> 
                 
                >
            <!--end of rate input-->
            </div>
            
            <button type="submit">Calculate Total</button>
            
            
        </form>

       <?php
    //check if the form has been submitted    
        if(isset($_GET['amount'])){
            //perform the calculation
            $amount = $_GET['amount'];
            $rate = $_GET['rate'];
            $total = (($amount * $rate)/100)+$amount;
            echo '<output>£' . number_format ($total,2) . '</output>';
        }
    
        
            ?>
       
       
       
       
        
    </div>

   <?php

include 'includes/footer.php';


    ?>