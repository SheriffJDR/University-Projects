<?php

//Places info in textarea
function getInfo():string {

    //Checks of the confirmation page was called by the registration page
    if(!$_GET[2]){

        header('Location:index.php');
        exit();
    }

    //Displays driver login info in the text area on the confirmation page
    $driverInfo = '';
    $driverInfo = 'Please record the information to access your account: '."\n\n\n".'Licence No: '.$_GET[0]. "\n" .'Password: '. $_GET[1];
    
    return $driverInfo;

}



