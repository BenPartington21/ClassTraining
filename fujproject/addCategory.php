<?php

//set the title for the page
$title = 'PHP Course - Add Category';

include 'includes/header.php';

?>

    <div class="container">

       <h1>Add Category</h1>
        
        <form action="addCategoryAction.php" method="post">

            <div class="form-group">
                <label for="category">Category Label</label>
                <input type="text" name="category" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Add Category</button>

        </form>
        
        
        
        
          
    </div>

   <?php

include 'includes/footer.php';


    ?>