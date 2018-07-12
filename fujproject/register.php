<?php

//set the title for the page
$title = 'PHP Course - Registration  Page';

include 'includes/header.php';

?>

    <div class="container">
        
        <h1>Register</h1>

        <form action="registerAction.php" method="post">

            <div class="form-group">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Register</button>

        </form>




    </div>

    <?php

include 'includes/footer.php';


    ?>
