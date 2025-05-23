<?php

function matching(string $license, string $password){

    //Checks if the file exists 
    if(!file_exists('../../Records/drivers.csv')){
        echo('File does not exits.');
        exit();
    }

    if(file_exists('../../Records/drivers.csv')){

        //Opens file
        $fileobj = fopen('../../Records/drivers.csv',"r");
       
        //Stores each line of data in an array
        while(($record = fgetcsv($fileobj,150,",")) !== false){

            if($record[1] == $license && $record[2] == $password){

                /*Updates the PHP session management superglobal $_SESSION array with the first name,
                last name and license number using index names first_name, last_name and licence.*/
               
                session_start();
                $_SESSION["first_name"] = $record[3];
                $_SESSION["last_name"] = $record[4];
                $_SESSION["licence"] = $record[1];

                $temp[] = $_GET[0];
                header('Location: public_console.php?'.http_build_query($temp));
                
            }
            
        }
        
        //closes file
        fclose($fileobj);
    }
    
}

if(empty($_GET[1]) || empty($_GET[2])){
    //error message
    echo('No information recieved.');
}

if(!empty($_GET[1]) && !empty($_GET[2])){

    matching($_GET[1],$_GET[2]);
    //echo($_SESSION["first_name"].' '.$_SESSION["last_name"].' '. $_SESSION["licence"]);
}