<?php

//set the title for the page
$title = 'PHP Course - Sign In Page';

include 'includes/header.php';

?>

    <div class="container">

        <form>

            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="text" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" id="password">
            </div>



            <button type="submit">Log In</button>

        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
                //prevent the form from being submitted
                e.preventDefault(); //stops browser default behaviour
                signInViaAJAX();
            }) //EO filterForm.submt();


        }); //end of document.ready


        function signInViaAJAX() {
            //create a dataObj to pass to the server
            var dataObj = {
                email: $('#email').val(),
                password: $('#password').val()
            } //end of dataObj

            //now try and sign in with an AJAX request to server

            $.ajax({
                url: 'checkCredentials.php',
                type: 'post',
                dataType: 'json',
                data: dataObj,
                success: function(data){
                    console.log(data);
                    if(data.length>0){
                       sessionStorage.setItem('loggedIn' ,'1');
                       sessionStorage.setItem('role' ,data[0].role);
                        window.location = 'index.php';
                    }else{
                        alert('Not found');
                    }
                },
                error: function(x, m, s) {
                    console.log(m)
                }
            }); //end of AJAX()






        } //EO signInViaAJAX()

    </script>




    <?php

include 'includes/footer.php';


    ?>
