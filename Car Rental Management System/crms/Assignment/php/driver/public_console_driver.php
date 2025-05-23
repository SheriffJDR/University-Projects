<?php
//Checks if user is logged in 
function checkLogin(){

    //session_start();
 
    if(filter_var($_GET[0],FILTER_VALIDATE_BOOLEAN) === true){
        echo'';
    }
    else{
        echo('<h3>Name:'. $_SESSION["first_name"].' '. $_SESSION["last_name"].' </h3>
        <h3>License No: '. $_SESSION["licence"].'</h3>');
    }
    
  
}
