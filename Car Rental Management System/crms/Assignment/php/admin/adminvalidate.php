<?php
session_start();

require 'AdminValidateClass.php';

//Creates an AdminValidateClass object to validate data from the form 
$isValid = new AdminValidate();


//Checks if data has been posted to the server
if(empty($_POST)){

    //Redirects user to index page
    $errors['errors'] = "Data must be inputed";
    $errorMessages = $errors;
    header('Location:index.php?'.http_build_query($errorMessages));
    exit();
}

//$_SESSION['validation_type'] = $_POST['validation_type'];

//Returns error messages if both the employes 
if(!($isValid->checkEmployeeId($_POST["employee_id"]))||!($isValid->checkPassword($_POST["password"]))){
    
    //Gets the errors produced during validation
    $errorMessages = $isValid->getErrors();

    //Passes the errors to be displayed back to the index page as an encoded query string
    header('Location:index.php?'. http_build_query($errorMessages));
    exit;
}
else{
    //Matching
    require 'authenticate.php';
  
}