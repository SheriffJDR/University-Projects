<?php
session_start();
define('LICENSE_RANDOM_LENGTH',7);
define('LICENSE_DATE_LENGTH',8);
define('MINIMUM_YEAR',1952);
$data = array();
global $error;

/****************************************
 * Registration form validation
 */

//Validates id input from the form
function checkId(string $id):bool{
    //Checks if the field is empty
    
    if($id == '')
    {
        $GLOBALS['error']["Id"] = 'National id field is empty';
        return false;
    }

    //Checks if the string is the correct length
    if(strlen($id) != 15)
    {
        $GLOBALS['error']["Id"] = 'National id must be 15 characters long';
        return false;
    }
    //Checks of the string only contains numbers and hyphens
    for($i= 0; $i < strlen($id); $i++ )
    {
        //Stored the ascii code of the curent charater in the string
        $char_val = ord($id[$i]);

        if($i == 4 && !($char_val == 45))
        {
            $GLOBALS['error']["Id"] = 'ID check failed: Must be in the format (yyyy-mm-dd-xxxx)';
            return false;
        }

        if($i == 7 && !($char_val == 45))
        {
            $GLOBALS['error']["Id"] = 'ID check failed: Must be in the format (yyyy-mm-dd-xxxx)';
            return false;
        }
        if($i == 10 && !($char_val == 45))
        {
            $GLOBALS['error']["Id"] = 'ID check failed: Must be in the format (yyyy-mm-dd-xxxx)';
            return false;
        }

        //Checks that only numbers and dashes are in the string.
        if(!((($char_val >= 48 && $char_val <= 57)) || ($char_val == 45))){
            
            $GLOBALS['error']["Id"] = 'ID check failed: ID contains illegal characters.';
            return false;
        }
        
        
    }

    //Splits the id string into the yyyy,mm,dd,xxxx
    list($year,$month,$day,$last) = explode('-',$id);
    
     //Checks that the year field of the id lies between 1952 and 2002
     if(!(intval($year) >= 1952 && intval($year) <= 2006)){
        $GLOBALS['error']["Id"]='Year must between 1952 and 2006';
        return false;
    }

    //Checks that the month field of the id lies between 1 and 12
    if(!(intval($month) >= 1 && intval($month) <= 12)){
        $GLOBALS['error']["Id"]='Month must between 01 and 12';
        return false;
    }

    //Checks that the day field of the id lies between 1 and 31
    if(!(intval($day) >= 1 && intval($day) <= 31)){
        $GLOBALS['error']["Id"]='Day must between 01 and 31';
        return false;
    }

    //Checks that the random number field of the id lies between 1 and 9999
    if(!(intval($last) >= 1 && intval($last) <= 9999)){
        $GLOBALS['error']["Id"]= 'Last 4 digits must be between 0001 and 9999';
        return false;
    }

    unset($GLOBALS['error']["Id"]);
    return true;
    

}

//Generates license number
function generateLicense() : string
{
    //Checks if the national id was sent to the server
    if(!isset($_GET['nationalId'])){
        return '';
    }
    $idString = $_GET['nationalId'];

    //Stores characters for the random part of the license number
    $char_array = [];

    //Randomly generate 7 digits
    for($i = 0; $i < LICENSE_RANDOM_LENGTH; $i++){
    
        //Generates numbers from their ASCII codes and stores them in a character array
        $char_array[$i] = chr(rand(48,57));
    }

    //Stores characters for the id date part of the license number
    $idChar_array = [];

    for($i = 0; $i < strlen($idString) - 4; $i++){
        
        //Stores all the character except the hyphens
        if(ord($idString[$i]) == 45){
            continue;
        }
        array_push($idChar_array,chr(ord($idString[$i])));
    }

    for($i = 0; $i < count($idChar_array); $i++ ){

        array_push($char_array,$idChar_array[$i]);
    }

     $LicenseStringVal = implode('',$char_array);

    //PLaces the generated  license number in the text box
    return $LicenseStringVal;

}

//Validates First name and Last Name inputs
function checkName(string $name, string $type):bool{

    //Checks if type is valid
    if(!(($type == "first")||($type == "last"))){

        //echo('Name check failed :'. $type . ' is invaid.');
        return false;
    }

    //Iterates over each character in the string to to check if their are valid characters(only letters of the alphabet)

    if($type == "first")
    {
        
        //checks if the string is empty
        if($name == ''){
            $GLOBALS['error']['first_name'] = 'First name is empty.';
            return false;
        }

        for($i = 0; $i < strlen($name);$i++){

            //Stores the ascii code of the current charater in the string
             $char_val = ord($name[$i]);

            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){

                $GLOBALS['error']['first_name'] ='First name incorrect format';
                return false;
            }

        }
        unset($GLOBALS['error']['first_name']);
        return true;
    }
    else{
            //checks if the string is empty
            if($name == ''){
                $GLOBALS['error']['last_name'] = 'Last name is empty.';
                return false;
            }
        for($i = 0; $i < strlen($name);$i++){
            //Stored the ascii code of the current charater in the string
            $char_val = ord($name[$i]);

            //Returns false if an invalid character is decteced
            if(!((($char_val >= 65 && $char_val <= 90)) || (($char_val >= 97 && $char_val <= 122)) || ($char_val == 45))){

                $GLOBALS['error']['last_name'] ='Second name is incorrect format';  
                return false;
            }
        }
        unset($GLOBALS['error']['last_name']);
        return true;
    }
}

//Validates email according to RFC822 standard
function checkEmail(string $email) : bool{
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){

        unset($GLOBALS['error']['Email']);
        return true;
    }
    else{
        $GLOBALS['error']['Email'] = "Invalid email";
        return false;
    }
}

//Validates telephone number input
function checkTelNum(string $prefix, string $line_number){

    //Checks if both boxes are empty
    if($prefix == '' && $line_number == ''){

        unset($GLOBALS['error']['Telephone']);
        unset($GLOBALS['error']['Prefix']);
        unset($GLOBALS['error']['Line number']);

        return true;
    }
    //Checks if one box is empty and not the other
    if((!$prefix == '' && $line_number == '') || ($prefix == '' && !$line_number == '')){
        
       //Displays error message on the page
       $GLOBALS['error']['Telephone'] ='Telphone number information missing';
       return false;
    }

    //Checks if the prefix is the correct length
    if(!(strlen($prefix) == 3)){

        //Displays error message on the page
        $GLOBALS['error']['Prefix'] ='Telephone number prefix must be 3 numbers in length';
       return false;
    }

    //Checks if the  line number is the correct length
    if(!(strlen($line_number) == 4)){

        //Displays error message on the page
        $GLOBALS['error']['Line number'] ='Telephone line number must be 4 numbers in length';
        return false;
    }

    //Checks that the input only contains numbers
    for( $i = 0; $i < strlen($prefix); $i++){

         $char_val = ord($prefix[$i]);
        
        //Checks if the first digit is a 1 or 0
        if($i == 0 && ($char_val == 48 || $char_val == 49)){
            //Displays error message on the page
            $GLOBALS['error']['Prefix'] = 'invalid character';
           
            return false;
        }

        if(!($char_val >= 48 && $char_val <= 57))
        {
            //Displays error message on the page
            $GLOBALS['error']['Prefix'] ='invalid character';
            return false;
        }
    }

    //Checks that the input only contains numbers
    for( $i = 0; $i < strlen($line_number); $i++){

        $char_val = ord($line_number[$i]);

        if(!($char_val >= 48 && $char_val <= 57))
        {
            //Displays error message on the page
            $GLOBALS['error']['Line number'] ='invalid character';
            return false;
        }
    }

    unset($GLOBALS['error']['Telephone']);
    unset($GLOBALS['error']['Prefix']);
    unset($GLOBALS['error']['Line number']);

    return true;
}

//Validates address
function checkAddress(string $addr):bool{
 
    //checks if the string is empty
    if($addr == ''){

        //Displays error message on the page
        $GLOBALS['error']['Address'] ='Address is empty.';
        return false;
    }

    for($i = 0; $i < strlen($addr); $i++){

        //Stored the ascii code of the curent charater in the string
        $char_val = ord($addr[$i]);

        //Checks that only alphanumeric characters and spaces are in the string.
        if(!(($char_val >= 48 && $char_val <= 57) || ($char_val == 32) || ($char_val >= 65 && $char_val <= 90) || ($char_val >= 97 && $char_val <= 122))){
            
            //Displays error message on the page
            $GLOBALS['error']['Address'] ='Addresses must be only alphanumeric characters and spaces';
            return false;
        }
    }

    unset($GLOBALS['error']['Address']);
    return true;
}

function checkAddresses(): bool
{

    //No error thrown if both address inputs are empty
    if(empty($_GET['address1']) && empty($_GET['address2'])){
        //echo'Empty';
        unset($GLOBALS['error']['Address']);
        return true;
    }

    if(empty($_GET['address1']) && !empty($_GET['address2'])){
        $GLOBALS['error']['Address'] ='If an adress is given then it must be put in address 1';
        return false;
    }

    if(!empty($_GET['address1']) && !empty($_GET['address2'])){
       
        if(checkAddress($_GET['address1']) && checkAddress($_GET['address2']))
        {
            //echo'Checked both';
            unset($GLOBALS['error']['Address']);
            return true;
        }
        else{
            $GLOBALS['error']['Address'] ='Address incorrect format';
            return false;
        }
        
    }

    if(!empty($_GET['address1']) && empty($_GET['address2'])){
       
        if(checkAddress($_GET['address1']))
        {
            //echo'Checked 1';
            unset($GLOBALS['error']['Address']);
            return true;
        }
        else{
            $GLOBALS['error']['Address'] ='Address 1 incorrect format';
            return false;
        }
        
    }

}

//Generates password for user
function passwordGeneration():string{

    //Password Generation
    //Randomly generates the length of the password

    $length = rand(10,18);
    $char_array = array();
    $chars = null;

    //Randomly generates ascii codes that match the criteria for the characters of a password
    for($i = 0; $i < $length; $i++){

        //Genearate a character for the first char of the password
        if($i == 0){

            //Generates ascii codes which match lower and upper case characters
            while(!(($chars >= 65 && $chars <= 90) || ($chars >= 97 && $chars <= 122))){
                $chars = rand(65,122);
            }

            //Adds the character which matches the ascii code to the array
            $char_array[0] = chr($chars);

            continue;
        }

        //Generates ascii codes which match lower and upper case characters and numbers
        do
        {
            $chars = rand(48,122);
           
        }while(!(($chars >= 65 && $chars <= 90) || ($chars >= 97 && $chars <= 122) || ($chars >= 48 && $chars <= 57)));
        
     
        //Adds the character which matches the ascii code to the array
        $char_array[$i] = chr($chars);
    }


    //Checks if the password contains at least one upper case character and at least one number
    $upperCaseCount = 0;
    $numCount = 0;

    for($i = 0; $i < count($char_array); $i++){

       if(ord($char_array[$i]) >= 65 && ord($char_array[$i]) <= 90 ){

            $upperCaseCount++;
       }
       if(ord($char_array[$i]) >= 48 && ord($char_array[$i]) <= 57){

            $numCount++;
       }
    }

    //If an upper case character is missing from the password one is added to a random position
    $insertionPosition = 0;

    if($upperCaseCount == 0 ){

        //Inserts a capital letter into the character array for the password
        $insertionPosition = rand(1,count($char_array) - 1);
        $chars = rand(65,90);

        $char_array[$insertionPosition] = chr($chars);
    }

    //If a number is missing from the password one is added to a random position

    //Stores the last position a correction to the password was made so further corrections do not breach the password criteria
     $previousPosition = $insertionPosition; 

    if($numCount == 0 ){
        
        //Generates a random position such that the inserted number is not inserted in the same position as the previous inserted character 
        while($insertionPosition == $previousPosition){

            $insertionPosition = rand(1,count($char_array) - 1); //$Math.floor((Math.random()* (char_array.length - 1 )) + 1);
        }

        //Adds character to the cahracter array
        $chars = rand(48,57);
        $char_array[$insertionPosition] = chr($chars);
        
    }
    
    //Concatenates the characters in char_array 
    $password = implode('',$char_array);
    
    return $password;
}

/************************************************
 * Driver index validation function
 ***********************************************/
//Validates driver license number
function checkLicenseno($lno) : bool
{
    //checks if the textbox is empty
    if($lno == ''){

    $GLOBALS['error']['License No.'] ='No number entered';
    return false;
 }

 //checks if the the string is the required length
 if(strlen($lno) != 15){

    $GLOBALS['error']['License No.'] = 'Must be 15 characters long';
    return false;
 }
    
 //Checks if the string only contains a digits
 for($i = 0 ; $i < strlen($lno); $i++){

    $char_val = ord($lno[$i]);

    //Checks that each character in the string is a number
    if(!($char_val >= 48 && $char_val <= 57)){

        $GLOBALS['error']['License No.'] = 'License number must only contain digits';
       return false;
    }
 }

    //Splits the national id section of license string into its respective fields for validation 
    $licenseArray = array();
    for($i = 7 ; $i < strlen($lno); $i++){

    //Stores the individual characters of the license string 
    $licenseArray[] = chr(ord($lno[$i]));

    //Separates the yyyy,mm,dd,xxxx fields by a space in License array
    if($i == 10 ){$licenseArray[] = (' ');}

    if($i == 12 ){$licenseArray[] = (' ');}
 }

    //Stores the fields in an array
    $nationalIdFields = explode(' ',implode('',$licenseArray));

    //Checks that the year field of the id lies between 1952 and 2002
    if(!(intval($nationalIdFields[0]) >= 1952 && intval($nationalIdFields[0]) <= 2006)){

        $GLOBALS['error']['License No.'] = 'Year must between 1952 and 2006';
        return false;
    }

    //Checks that the month field of the id lies between 1 and 12
    if(!(intval($nationalIdFields[1]) >= 1 && intval($nationalIdFields[1]) <= 12)){

        $GLOBALS['error']['License No.'] ='Month must between 01 and 12';
        return false;
    }

    //Checks that the day field of the id lies between 1 and 31
    if(!(intval($nationalIdFields[2]) >= 1 && intval($nationalIdFields[2]) <= 31)){

        $GLOBALS['error']['License No.'] = 'Day must between 01 and 31';
        return false;
    }

    unset($GLOBALS['error']['License No.']);
    return true;
}

//Validates driver password
function checkPassword(string $passwd):bool{

   //Checks if the string is empty 
   if($passwd == ''){
      $GLOBALS['error']['Password'] ='Password field is empty.';
      return false;
   }
   
   //Checks if the licence number is between 10-18 characters
   if(!(strlen($passwd) >= 10 && strlen($passwd) <= 18)){
        $GLOBALS['error']['Password'] ='Password must be between 10-18 characters.';
      return false;
   }

   //Validates the string according to criteria characters

    $capitalCount = 0;
    $numberCount = 0;

   for($i = 0; $i < strlen($passwd);$i++){

      //Stored the ascii code of the current charater in the string
      $char_val = ord($passwd[$i]);

      //checks if the string start with a character
      if(($i == 0) && !(($char_val >= 65 && $char_val <= 90 || $char_val >= 97 && $char_val <= 122))){

        $GLOBALS['error']['Password'] ='Password does not start with a character';
        return false;
      }

      //Checks if the string contains an upper case letter
      if($char_val >= 65 && $char_val <= 90 ){

        $capitalCount++;
      }

      //Checks if the string contains a number
      if($char_val >= 48 && $char_val <= 57 ){

        $numberCount++;
      }

      //checks if the string only conatins alphanumeric characters 
      if(!($char_val >= 48 && $char_val <= 57 || $char_val >= 65 && $char_val <= 90 || $char_val >= 97 && $char_val <= 122)){
          
        $GLOBALS['error']['Password'] ='Illegal characters detected';
        return false;
      }
  }

  if(!$capitalCount > 0){

    $GLOBALS['error']['Password'] = 'Password must contain at least one upper case character';
      return false;
  }

  if(!$numberCount > 0){

    $GLOBALS['error']['Password'] ='Password must contain at least one number'; 
    return false;
  }
  
  unset($GLOBALS['error']['Password']);
   return true;
}

//Checks which page requires validation and only performs the required validation

$_GET["licenseNo"] = generateLicense();

if($_GET["validation_type"] == "registration"){

    //if(filter_var($_GET['js_validated'],FILTER_VALIDATE_BOOLEAN) === false){

        if(checkId($_GET['nationalId']) && checkLicenseno($_GET["licenseNo"]) && checkName($_GET["firstName"], "first") && checkName($_GET["lastName"], "last") && checkEmail($_GET["email"]) && checkTelNum($_GET["prefix"],$_GET["lineNumber"]) && checkAddresses()){
        
            /*Passes the generated license No. string and the generated password 
            string to the confirmation to be displayed
            */
            $licenseNo[] = $_GET["licenseNo"];
            array_push($licenseNo , passwordGeneration());
            array_push($licenseNo , true);
            $licenseNoArray = $licenseNo;
            header('Location:confirmation.php?'. http_build_query($licenseNoArray));
            exit();
        }
        else{
            /*Adds error messages to the global error array which is passed as query string
            back to index page to display the error messages*/

            $errorMessage['messages'] = $error;
            header('Location:registration.php?'. http_build_query($errorMessage));
            exit();
        }
    // }
    // else{
    //     return;
    // }
}

//Carries out validation for the index page
if($_POST["validation_type"] == "index"){


    //if(filter_var($_POST['js_validated'],FILTER_VALIDATE_BOOLEAN) === false){

        //Checks if a user is already logged in
        if(isset($_SESSION["first_name"]) && isset($_SESSION["last_name"]) && isset($_SESSION["licence"]))
        {
            /*Adds error message to the global error array which is passed as query string
            back to index page to display the error message*/

            $GLOBALS['error']['Login failed'] = "User Already Logged on.";
            $errorMessage['messages'] = $error;
            header('Location:index.php?'. http_build_query($errorMessage));
            exit();
        }

        if(checkLicenseno($_POST["licenseNo"]) && checkPassword($_POST["password"])){
        
            /*Passes validated license NO. string and password string to the sign_in_user 
            script to be added to the public console page*/
            $licenseNo[] = false;
            array_push($licenseNo ,$_POST["licenseNo"]);
            array_push($licenseNo ,$_POST["password"]);
            $licenseNoArray = $licenseNo;
            header('Location:sign_in_user.php?'. http_build_query($licenseNoArray));
            exit();
        }
        else{

            /*Adds error message to the global error array which is passed as query string
            back to index page to display the error message*/

            $errorMessage['messages'] = $error;
            header('Location:index.php?'. http_build_query($errorMessage));
            exit();
        }
    // }
    // else{
    //     return;
    // }
}


    