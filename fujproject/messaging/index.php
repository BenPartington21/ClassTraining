<?php

//set the title for the page
$title = 'PHP Course - Send us a message';

include '../includes/header.php';

?>

    <div class="container">

        <form>

            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <select id="category" class="form-control">
                   
                   <option value="null">Please select a category...</option>
                   
                    <?php
                    //connect to db
                    require_once('../dbconfig.php');
                    var_dump($conn);
                    //prepare sql query string
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    //loop thru the resutls and create options for the select menu.
                    while($row = $result->fetch_array()){
                    echo '<option value="'.$row['category_id'].'">' .$row['category_label'].'</option>';
                    }
                    
                    
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea maxlength="200" id="message" class="form-control"></textarea>
            </div>









            <button id="sendBtn" type="button" class="btn btn-success">Send</button>



        </form>



        <script>
            $(document).ready(function() {
                //listen for the user clicking the send button

                $('#sendBtn').click(function() {
                    sendFormViaAJAX();



                }); //end of sendbtn.click

            }); //end of document.ready


            function sendFormViaAJAX() {


                var formVaild = true;
                //check email is supplied
                if ($('#email').val() == '') {
                    formVaild = false;
                } else {
                    var email = $('#email').val();
                }



                //check category is supplied
                if ($('#category').val() == 'null') {
                    formVaild = false;
                } else {
                    var category = $('#category').val();
                }


                //check message is supplied
                if ($('#message').val() == '') {
                    formVaild = false;
                } else {
                    var message = $('#message').val();
                }


                //if everything ok,
                if (formVaild) {

                    var dataObj = {
                        email: email,
                        category: category,
                        message: message
                    } //end of dataobj

                    //console.log(dataObj);


                    //send data to serverside using AJAX
                    $.ajax({
                        url: 'saveMessage.php',
                        type: 'post',
                        data: dataObj,
                        dataType: 'text',
                        success: function(data) {
                            console.log(data)
                        },
                        error: function(x, m, s) {
                            console.log(m)
                        }
                    }); //end of ajax
                }







            } //EO sendformviaajax

        </script>






    </div>

    <?php

include '../includes/footer.php';


    ?>
