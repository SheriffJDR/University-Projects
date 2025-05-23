<?php
session_start();

 //Checks if javascript has ran
 if(filter_var($_GET[0],FILTER_VALIDATE_BOOLEAN) === true){
    return;
}

//Checks if a user is logged on by check SESSION superglobal
function checkLoginStatus(){

    if(isset($_SESSION["first_name"]) && isset($_SESSION["last_name"]) && isset($_SESSION["licence"])){
        return; 
    }
    else{       
        //header("Location:index.php");
        //exit();
    }
}

checkLoginStatus();