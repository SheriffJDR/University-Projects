<?php
class AdminValidate{
    private $errors;
    private $depts = array("ADMN" => "ADMN", "CLRK" => "CLRK" , "USER" => "USER", "DRVR" =>"DRVR");

    //Validates employee ID
    public function checkEmployeeId(string $empid):bool{
        //Validates Employee Id input 

        $employeeIdString = $empid;

        //Checks if the string is empty 
        if($employeeIdString == ''){
            
            //Displays error messages on page
            $this->errors['ID'] = "EmployeeID is empty";
            return false;
        }

        //Checks of the employee id string is the corrent length
        if(!(strlen($employeeIdString) == 12) ){
    
            //Displays error messages on page
            $this->errors['ID'] = "must be 12 characters long.";
            return false;
        }

        for($i = 0 ; $i < strlen($employeeIdString) - 4 ; $i++){

            $char_val = ord($employeeIdString[$i]);

        //Checks that first 8 characters of the string are only numbers
        if(($i <= 7)&&!($char_val >= 48 && $char_val <= 57)){   

                //Displays error messages on page
                $this->errors['ID'] = "The first 8 characters must be numbers.";

                return false;
            }

            //Checks that last 4 characters of the string are only upper case characters
        if(($i >= 8) && !($char_val >= 65 && $char_val <= 90)){ 
            
                //Displays error messages on page
                $this->errors['ID'] = "The last 4 characters must be upper case letters.";
                return false;
            }
        }

        $char_array = array();
    
        for($i = 0 ; $i < strlen($employeeIdString); $i++){

            array_push($char_array,chr(ord($employeeIdString[$i])));

            if($i == 3){

               $tempString = implode('',$char_array);

                if(intval($tempString) != 1100)
                {
                    //Displays error messages on page
                    $this->errors['ID'] = "must start 1100.";

                    return false;
                }
            }

            //Clears char array
            if($i == 7){
                
                $char_array = array();
            }

            //Validates the last 4 characters of the employee id
            if($i == 11){

                //Converts the characterarray into a string
                $tempString = implode('',$char_array);

                //Checks if the last 4 character match the allowed strings
                if(!($tempString == $this->depts["ADMN"] || $tempString == $this->depts["CLRK"] || $tempString == $this->depts["USER"] || $tempString == $this->depts["DRVR"])){

                    //Displays error messages on page
                    $this->errors['ID'] = "must end in one of the following options:<br>[ADMN,CLRK,USER,DRVR].";
                    return false;
                }
            }

        }

        unset($this->errors['ID']);
        return true;
    }

    //Validates employee password
    public function checkPassword(string $passwd):bool{

        //Checks if the string is empty 
        if($passwd == ''){
            $errors['Password'] ='Password field is empty.';
            return false;
        }
        
        //Checks if the licence number is between 10-18 characters
        if(!(strlen($passwd) >= 10 && strlen($passwd) <= 18)){
            $errors['Password'] ='Password must be between 10-18 characters.';
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
        
                $errors['Password'] ='Password does not start with a character';
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
                
                $errors['Password'] ='Illegal characters detected';
                return false;
            }
        }
    
        if(!$capitalCount > 0){
        
            $errors['Password'] = 'Password must contain at least one upper case character';
            return false;
        }
        
        if(!$numberCount > 0){
        
            $errors['Password'] ='Password must contain at least one number'; 
            return false;
        }
        
        unset($this->errors['Password']);
        return true;
    }

    public function getErrors(){
        return $this->errors;
    }
}

