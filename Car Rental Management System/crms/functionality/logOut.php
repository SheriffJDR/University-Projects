<?php
require "authenticateClass.php";
//Starts session

$check = new authenticateClass();

if($check->isUserLoggedIn()){
    $check->logOutUser();
}else{
    header("Location:../template/index.php");
}
