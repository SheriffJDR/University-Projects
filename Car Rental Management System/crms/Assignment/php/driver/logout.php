<?php
session_start();

//Logs out user by removing the session varibles stored in the $_SESSION super global

function logOutPhp(){
    
    //Reomves the session variables
    unset($_SESSION["first_name"]);
    unset($_SESSION["last_name"]);
    unset($_SESSION["licence"]);

    //Redirects user to log in page
    //header('Location: index.php');
    exit();
}

logOutPhp();