<?php
require 'AuthenticateClass.php';

$isAuthenticated = new Authenticate();

//Logs in user
$isAuthenticated->logInUser($_POST);


//Checks if the users is logged on
if($isAuthenticated->isUserLoggedIn()){

    header("Location:admin_console.php");
}
else{
    $errorMessages = $isAuthenticated->getErrors();
    header("Location:index.php?".http_build_query($isAuthenticated->getErrors()));
}