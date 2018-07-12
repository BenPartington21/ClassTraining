
<form action="a" method="get">
<input type="text" name="pwd">

<button name="submitBtn" type="sumbit">Login</button>
</form>



<?php


$encryptedPasswordInDB = md5('fujitsu');

if(isset($_GET['submitBtn'])){
   $password = $_GET['pwd'];
    if(md5($password) == $encryptedPasswordInDB){
        echo 'You are in';
        }else{
        echo 'Go Away';
    }
    }
    

}

?>