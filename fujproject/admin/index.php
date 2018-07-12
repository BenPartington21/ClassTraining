<?php

//set the title for the page
$title = 'PHP Course - Message Administration';

include '../includes/header.php';

?>

    <div class="container">

       <form id="filterForm">
           
           <select id="category" class="form-control">
               <option value="all">All Categories</option>
                   <?php
                    //connect to db
                    require_once('../dbconfig.php');
                    //prepare sql query string
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    //loop thru the resutls and create options for the select menu.
                    while($row = $result->fetch_array()){
                    echo '<option value="'.$row['category_id'].'">' .$row['category_label'].'</option>';
                    }
                    
                    
                    ?>
           </select>
           
           
           <div class="form-group">
               <input class="form-control" id="textFilter" placeholder="Filter by keywords">
           </div>
           
           
           
           <button type="submit" id="getBtn" class="btn btn-success">Get Messages</button>
           
           
           
           
       </form>
       
       
       
       <table id="messagesTbl" class="table table-bordered table-striped">
           <thead>
               <th>Email</th>
               <th>Category</th>
               <th>Message</th>
               <th>Date</th>
           </thead>
           <tbody></tbody>
       </table>
       
        
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
    
    
    <script>

        $(document).ready(function(){
                
            
            //initially hide the table
            $('#messagesTbl').hide();
            
            
            $('#filterForm').submit(function(e){
                //prevent the form from being submitted
                e.preventDefault();  //stops browser default behaviour
                getMessagesViaAJAX();
            }) //EO filterForm.submt();
                                    
            
            
            
            

            }); //end of document.ready
        
        function getMessagesViaAJAX(){
            //PREPARE THE DATA TO BE SENT TO THE SERVER
        
        var dataObj = {
            catFilter:$('#category').val(),
            textFilter: $('#textFilter').val()
        }//EO DataObj
        //send data to serverside using AJAX
                    $.ajax({
                        url: 'getMessages.php',
                        type: 'post',
                        data: dataObj,
                        dataType: 'json',
                        success: function(data) {
                            renderMessages(data)
                        },
                        error: function(x, m, s) {
                            console.log(m)
                        }
                    }); //end of ajax
        }//EO getMessagesViaAJAX
        
        
        
        function renderMessages(data){
            //initially hide the table
            $('#messagesTbl').hide();
            
            //prepare Obj for handlebars
            var hbObj = {messages:data};
            var source = $('#messagesTemplate').html();
            var template = Handlebars.compile(source);
            var html = template(hbObj);
            $('#messagesTbl tbody').html(html);
            //now show the table
            //initially hide the table
            $('#messagesTbl').fadeIn();
            
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
</script>
    
    
    <script id="messagesTemplate" type="x-handlebars-template">


   {{#each messages}}

      <tr>
          <td>
               {{email}}
          </td>
          <td>
               {{category_label}}
          </td>
          <td>
               {{message}}
          </td>
          <td>
               {{date}}
          </td>
          
          
          


      </tr>



    {{/each}}


</script>
    
    
    
    
    
   <?php

include '../includes/footer.php';


    ?>