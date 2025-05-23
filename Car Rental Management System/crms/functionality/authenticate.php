<?php
require 'authenticateClass.php';

$isAuthenticated = new authenticateClass();

//Logs in user
$isAuthenticated->logInUser($_POST);


//Checks if the users is logged on
if($isAuthenticated->isUserLoggedIn()){
    header("Location:../template/dashboard.php");
    echo"worked";
}
else{
    $errorMessages = $isAuthenticated->getErrors();
    header("Location:../template/index.php?".http_build_query($isAuthenticated->getErrors()));   
    echo" did not worked";
}