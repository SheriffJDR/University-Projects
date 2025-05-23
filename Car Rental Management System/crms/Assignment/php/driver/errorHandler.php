<?php

//Loads error messages on to the page
function processErrors(): string{

    //Checks if errors have been passed to the page using query string
    if(isset($_GET['messages'])){

        $errorStrings = '';

        //Interates over the array storing the error message and concatenates the string together.
        foreach($_GET['messages'] as $category => $value){
            $errorStrings .= '<br>'. $category . ": ".$value;
        }
        return $errorStrings;
    }
    else{
    
        return'';
        exit();
    }
}