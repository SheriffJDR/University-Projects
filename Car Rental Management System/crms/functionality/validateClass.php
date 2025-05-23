<?php
class validateClass{

    private $errors;

    /****************************
     * Index page validation *
    *****************************/

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
        
                for($i = 0 ; $i < strlen($employeeIdString); $i++){
        
                    $char_val = ord($employeeIdString[$i]);
        
                     //checks if the string only conatins alphanumeric characters 
                     if(!($char_val >= 48 && $char_val <= 57 || $char_val >= 65 && $char_val <= 90 || $char_val >= 97 && $char_val <= 122)){
                        
                        //Displays error messages on page
                        $this->errors['ID'] = "Id must only contain alphanumeric characters. ";
                        return false;

                        
                }
            }
                unset($this->errors['ID']);
                return true;
    }

    //Validates employee password
    public function checkPassword(string $passwd):bool{

        //Checks if the string is empty 
        if($passwd == ''){
            $this->errors['Password'] ='Password field is empty.';
            return false;
        }
        
        //Checks if the licence number is between 10-18 characters
        if(!(strlen($passwd) >= 10 && strlen($passwd) <= 18)){
            $this->errors['Password'] ='Password must be between 10-18 characters.';
            return false;
        }
    
        //Validates the string characters according to criteria
    
        for($i = 0; $i < strlen($passwd);$i++){
    
            //Stored the ascii code of the current charater in the string
            $char_val = ord($passwd[$i]);
        
            //checks if the string only conatins alphanumeric characters 
            if(!($char_val >= 48 && $char_val <= 57 || $char_val >= 65 && $char_val <= 90 || $char_val >= 97 && $char_val <= 122)){
                
                $this->errors['Password'] = 'Illegal characters detected';
                return false;
            }
        }
    
        unset($this->errors['Password']);
        return true;
    }

    /****************************
     * Vehicle page validation *
    *****************************/

    //Validates make input
    public function checkMake($makeString_):bool{
        
        //Checks if the string is emtpy.
        if($makeString_ == ''){

            $this->errors['make'] ='Vehicle make field is empty.';
            return false;
        }

        $makeString = str_replace(' ', '', $makeString_);
        
        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($makeString);$i++){

            $char_val = ord($makeString[$i]);

            //Checks if the string only contains letters of the alphabet
            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['make'] ='Vehicle make can only contain letters.';
                return false;
            }
        }
    
        unset($this->errors['make']);
        return true;
    }

    //Validates model input
    public function checkModel($modelString_):bool{
     
        //Checks if the string is emtpy.
        if($modelString_ == ''){
            
            $this->errors['model'] ='Vehicle model field is empty.';
            return false;
        }

        $modelString = str_replace(' ', '', $modelString_);;

        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($modelString);$i++){

             $char_val = ord($modelString[$i]);

            //Checks if the string only contains letters of the alphabet, numbers and hyphens
            if(!($char_val == 45) && !($char_val >= 48 && $char_val <= 57) && !($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['model'] ='Vehicle model field only allows letters, numbers and hyphens.';
                return false;
            }
        }

        unset($this->errors['model']);
        return true;
    }

    //Validates year input
    public function checkYear($yearString_):bool{

        //Checks if the string is emtpy.
        if($yearString_ == ''){

            $this->errors['year'] ='Vehicle model field is empty.';
            return false;
        }

        $yearString = str_replace(' ', '', $yearString_);

        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($yearString);$i++){

             $char_val = ord($yearString[$i]);

            //Checks if the string only contains numbers
            if(!($char_val >= 48 && $char_val <= 57)){
                
                $this->errors['year'] ='Vehicle year field only allows numbers.';
                return false;
            }
        }
        unset($this->errors['year']);
        return true;
    }

    //Validate vin input
    public function checkVin($vinString_):bool{

        //Checks if the string is emtpy.
        if($vinString_ == ''){
           
            $this->errors['vin'] ='Vehicle vin field is empty.';
            return false;
        }

        $vinString = str_replace(' ', '', $vinString_);

        //Checks if the string is 12 characters in length.
        if(strlen($vinString) == 12){

            $this->errors['vin'] ='Vehicle vin number must be 12 characters in lenght.';
            return false;
        }

        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($vinString);$i++){

            $char_val = ord($vinString[$i]);

            //Checks if the string only contains numbers.
            if(!($char_val >= 48 && $char_val <= 57)){

                $this->errors['vin'] ='Vehicle vin field only allows numbers.';
                return false;
            }
        }
        unset($this->errors['vin']);
        return true;
    }

    //Validate interior color input
    public function checkInteriorColor($interiorColorString_):bool{

        //Checks if the string is emtpy.
        if($interiorColorString_ == ''){
           
            $this->errors['interiorColor'] ='Vehicle interior color field is empty.';
            return false;
        }

        $interiorColorString = str_replace(' ', '', $interiorColorString_);

        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($interiorColorString);$i++){

            $char_val = ord($interiorColorString[$i]);

            //Checks if the string only contains numbers
            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['interiorColor'] ='Vehicle interior color field only allows letters.';
                return false;
            }
        }

        unset($this->errors['interiorColor']);
        return true;
    }

    //Validate exterior color input
    public function checkExteriorColor($exteriorColorString_):bool{

        //Checks if the string is emtpy.
        if($exteriorColorString_ == ''){
           
            $this->errors['exteriorColor'] ='Vehicle exterior color field is empty.';
            return false;
        }

        $exteriorColorString = str_replace(' ', '', $exteriorColorString_);

        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($exteriorColorString);$i++){

            $char_val = ord($exteriorColorString[$i]);

            //Checks if the string only contains numbers
            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['exteriorColor'] ='Vehicle exterior color field only allows letters.';
                return false;
            }
        }

        unset($this->errors['exteriorColor']);
        return true;
    }

    //Validate License plate input
    public function checkLicensePlate($licensePlateString_):bool{

        //Checks if the string is emtpy.
        if($licensePlateString_ == ''){
           
            $this->errors['licensePlate'] ='Vehicle license plate field is empty.';
            return false;
        }

        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($licensePlateString_);$i++){

            $char_val = ord($licensePlateString_[$i]);

            //cChecks if string contains a space
            if($char_val == 32){
                $this->errors['licensePlate'] ='Vehicle license plate field must not contain spaces';
                return false; 
            }

            //Checks if the string only contains numbers and letters
            if(!($char_val >= 48 && $char_val <= 57) && !($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['licensePlate'] ='Vehicle license plate field only allows numbers and letters.';
                return false;
            }
        }

        unset($this->errors['licensePlate']);
        return true;
    }

    //Validate odometer input
    public function checkOdometer($odometerString_):bool{

        //Checks if the string is emtpy.
        if($odometerString_ == ''){
           
            $this->errors['odometer'] ='Vehicle odometer field is empty.';
            return false;
        }

        $odometerString = trim( $odometerString_ , ' ');

        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($odometerString);$i++){

            $char_val = ord($odometerString[$i]);

            //Checks if the string only contains numbers.
            if(!($char_val >= 48 && $char_val <= 57)){

                $this->errors['odometer'] ='Vehicle odometer field only allows numbers.';
                return false;
            }
        }
        unset($this->errors['odometer']);
        return true;
    }

    /****************************
     * Customer page validation *
    *****************************/

    //Validation first Name input
    public function checkFirstName($firstNameString):bool{
        
        //Checks if the string is emtpy.
        if($firstNameString == ''){

            $this->errors['firstname'] ='First name field is empty.';
            return false;
        }

        $firstNameString = str_replace(' ', '', $firstNameString);
        
        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($firstNameString);$i++){

            $char_val = ord($firstNameString[$i]);

            //Checks if the string only contains letters of the alphabet
            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['firstname'] ='First name field can only contain letters.';
                return false;
            }
        }
    
        unset($this->errors['firstname']);
        return true;
    }

    //Validation last Name input
    public function checkLastName($lastNameString):bool{

        //Checks if the string is emtpy.
        if($lastNameString == ''){

            $this->errors['lastname'] ='Last name field is empty.';
            return false;
        }

        $lastNameString = str_replace(' ', '', $lastNameString);
        
        //Iterates through every charater of the string  
        for($i = 0; $i < strlen($lastNameString);$i++){

            $char_val = ord($lastNameString[$i]);

            //Checks if the string only contains letters of the alphabet
            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['lastname'] ='Last name field can only contain letters.';
                return false;
            }
        }
    
        unset($this->errors['lastname']);
        return true;
    }

    //Validation address input
    public function checkAddress($addressString):bool{

        //Checks if address input field is empty
        if($addressString == ''){

            $this->errors['address'] = "Address field is empty";
            return false;
        }

        $addressString = str_replace(' ','',$addressString);

        //Iterates through each character to check if they are acceptable characters.
        for($i = 0 ; $i < strlen($addressString); $i++){
            
            $char_val = ord($addressString[$i]);
            
            //Ensures that only numbers and letters are valid.
            if(!($char_val  >= 48 && $char_val <= 57) && !($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['address'] = "Address field only allows numbers and letters as valid inputs.";
                return false;
            }
        }

        unset($this->errors['address']);
        return true;
    }

    //Validate city input 
    public function checkCity($cityString):bool{

        //checks if the input is empty
        if($cityString == ''){

            $this->errors['city'] = "City input field is empty";
            return false;
        }
        
        $cityString = str_replace(' ','',$cityString);

        //Iterates through the characters to test their validity
        for($i = 0 ; $i < strlen($cityString); $i++){
            
            $char_val = ord($cityString[$i]);
        
            //Ensures that only alpabetical characters are allowed;
            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['city'] = "City field only allows letters as valid inputs.";
                return false;
            }
        }

        unset($this->errors['city']);
        return true;
    }

    //Email validation is handled byu the html itself
    //Email phone number is handled byu the html itself

    //Validate license number
    public function checkLicenseNumber($licenseNumberString):bool{

        //Checks if the input is empty
        if($licenseNumberString == ''){

            $this->errors['licenseNumber']  = "License number field is empty";
            return false;
        }

        //Removes all spaces
        $licenseNumberString = str_replace(' ','',$licenseNumberString);
        

        //Interates through the characters in the string to validate each character.
        for($i = 0; $i < strlen($licenseNumberString); $i++){

            $char_val = ord($licenseNumberString[$i]);

            //Ensure that only numbers are allowed
            if(!($char_val  >= 48 && $char_val <= 57)){

                $this->errors['licenseNumber'] = "License number field only allows numbers as valid input.";
                return false;
            }
        }

        unset($this->errors['licenseNumber']);
        return true;
    }

    //Validate License State of issue input
    public function checkIssue($issueString):bool{
        
        //Checks if the input is empty

        if($issueString == ''){
            $this->errors['issue'] = "License State/Province of Issue input is empty";
            return false;
        }

        //Removes any potential spaces
        $issueString = str_replace(' ','',$issueString);
        
        //Interates through the characters in the string to validate each charater.
        for($i = 0; $i < strlen($issueString); $i++){

            $char_val = ord($issueString[$i]);
            
            //Checks that only letters are valid 
            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['issue'] = "License State/Province of Issue input only accepts numbers and letters as valid input.";
                return false;
            }
        } 

        unset($this->errors['issue']);
        return true;
    }

    // License expiry date input validation is handled in the html
    
    //Validates card number input
    public function checkCardNumber($cardNumberString):bool{
        
        //Checks if the input is empty
        if($cardNumberString == ''){

            $this->errors['cardNumber'] = "Card number field is empty." ;
            return false;
        }

        //Removes all spaces 
        $cardNumberString = str_replace(' ', '', $cardNumberString);

        //Iterates through each character in the string to valid them.
        for($i = 0; $i < strlen($cardNumberString);$i++){

            $char_val = ord($cardNumberString[$i]);

            //Ensures that only valid input are numbers 
            if(!($char_val >= 48 && $char_val <= 57)){
                
                $this->errors['cardNumber'] = "Card number field only accepts numbers as valid input.";
                return false;
            }
        }

        unset($this->errors['cardNumber']);
        return true;
    }

    // Card expiry date input validation is handled in the html

    //Validate billing address input
    public function checkBillingAddress($billingAddressString):bool{
        //Checks if the input is empty
        if($billingAddressString == ''){

            $this->errors['billingAddress'] = "Billing Address input is empty.";
            return false;
        }

        //Removes all spaces
        $billingAddressString = str_replace(' ','', $billingAddressString);

        //Iterates through each character in the string for validation.
        for($i =0;$i < strlen($billingAddressString); $i++){

            $char_val = ord($billingAddressString[$i]);
            

            //Ensures that only letters and numbers are valid
            if(!($char_val  >= 48 && $char_val <= 57) && !($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){

                $this->errors['biilingAddress'] = "Billing address only accepts letters and numbers as valid input.";
                return false;
            }
        }

        unset($this->errors['billingAddress']);
        return true;
    }

    //Validate preferred vehicle type
    public function checkPreferredVehicleType($preferredVehicleString):bool{
        
        //checks if the input is empty
        if($preferredVehicleString == ''){

            $this->errors['preferredVehicle'] = "Preferred vehicle input field is empty";
            return false;
        }
        
        $preferredVehicleString = str_replace(' ','', $preferredVehicleString);

        //Iterates through the characters to test their validity
        for($i = 0 ; $i < strlen($preferredVehicleString); $i++){
            
            $char_val = ord($preferredVehicleString[$i]);
            
            //Ensures that only alpabetical characters are allowed;
            if(!($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['preferredVehicle'] = "Preferred vehicle field only allows letter as valid inputs.";
                return false;
            }
        }

        unset($this->errors['preferredVehicle']);
        return true;
    }
    
    //Validates rental duration input
    public function checkRentalDuration($durationString):bool{
    
        //Checks if the input is empty
        if($durationString == ''){

            $this->errors['duration'] = "Duration field is empty." ;
            return false;
        }

        //Removes all spaces 
        $durationString = str_replace(' ', '', $durationString);

        //Iterates through each character in the string to valid them.
        for($i = 0; $i < strlen($durationString);$i++){

            $char_val = ord($durationString[$i]);

            //Ensures that only valid input are numbers 
            if(!($char_val >= 48 && $char_val <= 57)){
                
                $this->errors['duration'] = "Duration field only accepts numbers as valid input.";
                return false;
            }
        }

        unset($this->errors['duration']);
        return true;
    }

    //Validation pick up location input
    public function checkPickUpLocation($pickUpString):bool{

        //Checks if address input field is empty
        if($pickUpString == ''){

            $this->errors['pickUp'] = "Pick up field is empty";
            return false;
        }

        //Removes spaces
        $pickUpString = str_replace(' ','',$pickUpString);

        //Iterates through each character to check if they are acceptable characters.
        for($i = 0 ; $i < strlen($pickUpString); $i++){
            
            $char_val = ord($pickUpString[$i]);
            
            //Ensures that only numbers and letters are valid.
            if(!($char_val  >= 48 && $char_val <= 57) && !($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['pickUp'] = "Pick up location field only allows numbers and letters as valid inputs.";
                return false;
            }
        }

        unset($this->errors['pickUp']);
        return true;
    }

    //Validation drop off location input
    public function checkDropLocation($dropOffString):bool{

        //Checks if address input field is empty
        if($dropOffString == ''){

            $this->errors['dropOff'] = "Drop off location field is empty.";
            return false;
        }

        //Removes spaces
        $dropOffString = str_replace(' ','',$dropOffString);

        //Iterates through each character to check if they are acceptable characters.
        for($i = 0 ; $i < strlen($dropOffString); $i++){
            
            $char_val = ord($dropOffString[$i]);
            
            //Ensures that only numbers and letters are valid.
            if(!($char_val  >= 48 && $char_val <= 57) && !($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['dropOff'] = "Drop off location field only allows numbers and letters as valid inputs.";
                return false;
            }
        }

        unset($this->errors['dropOff']);
        return true;
    }
/****************************
* Rentals page validation *
*****************************/
    //Validates customer Id input
    public function checkCustomerId($customerIdString):bool{
    
        //Checks if the input is empty
        if($customerIdString == ''){

            $this->errors['customerId'] = "Customer Id field is empty." ;
            return false;
        }

        //Removes all spaces 
        $customerIdString = str_replace(' ', '', $customerIdString);

        //Iterates through each character in the string to valid them.
        for($i = 0; $i < strlen($customerIdString);$i++){

            $char_val = ord($customerIdString[$i]);

            //Ensures that only valid input are numbers 
            if(!($char_val >= 48 && $char_val <= 57)){
                
                $this->errors['customerId'] = "Customer Id field only accepts numbers as valid input.";
                return false;
            }
        }

        unset($this->errors['customerId']);
        return true;
    }

    //Validates vehicle Id input
    public function checkVehicleId($vehicleIdString):bool{
    
        //Checks if the input is empty
        if($vehicleIdString == ''){

            $this->errors['vehicleId'] = "Vehicle Id field is empty." ;
            return false;
        }

        //Removes all spaces 
        $vehicleIdString = str_replace(' ', '', $vehicleIdString);

        //Iterates through each character in the string to valid them.
        for($i = 0; $i < strlen($vehicleIdString);$i++){

            $char_val = ord($vehicleIdString[$i]);

            //Ensures that only valid input are numbers 
            if(!($char_val >= 48 && $char_val <= 57)){
                
                $this->errors['vehicleId'] = "Vehicle Id field only accepts numbers as valid input.";
                return false;
            }
        }

        unset($this->errors['vehicleId']);
        return true;
    }

    //Validates outstanding balances input
    public function checkOutstandingBalances($outstandingString):bool{
    
        //Checks if the input is empty
        if($outstandingString == ''){

            $this->errors['outstandingBalances'] = "Outstanding balances field is empty." ;
            return false;
        }

        //Removes all spaces 
        $outstandingString = str_replace(' ', '', $outstandingString);

        if(!str_contains($outstandingString,'.')){

            //Iterates through each character in the string to valid them.

            for($i = 0; $i < strlen($outstandingString);$i++){

                $char_val = ord($outstandingString[$i]);

                //Ensures that only valid input are numbers 
                if(!($char_val >= 48 && $char_val <= 57)){
                    
                    $this->errors['outstandingBalances'] = "Outstanding balances field only accepts numbers as valid input.";
                    return false;
                }
            }
        }else if(!(strpos($outstandingString,'.') >= strlen($outstandingString) - 3)){
            
            $this->errors['outstandingBalances'] = "Outstanding balances field only accepts decimals with two digits after the decimal.";
            return false;

        }else{

            $outstandingString = str_replace('.', '', $outstandingString);
            //Iterates through each character in the string to valid them.
            for($i = 0; $i < strlen($outstandingString);$i++){

                $char_val = ord($outstandingString[$i]);

                //Ensures that only valid input are numbers 
                if(!($char_val >= 48 && $char_val <= 57)){
                    
                    $this->errors['outstandingBalances'] = "Outstanding balances field only accepts numbers as valid input.";
                    return false;
                }
            }
        }
       

        unset($this->errors['outstandingBalances']);
        return true;
    }

    //Validates rental rate input
    public function checkRentalRate($rentalRateString):bool{
    
        //Checks if the input is empty
        if($rentalRateString == ''){

            $this->errors['rentalRate'] = "Rental rate field is empty." ;
            return false;
        }

        //Removes all spaces 
        $rentalRateString = str_replace(' ', '', $rentalRateString);

        if(!str_contains($rentalRateString,'.')){

            //Iterates through each character in the string to valid them.

            for($i = 0; $i < strlen($rentalRateString);$i++){

                $char_val = ord($rentalRateString[$i]);

                //Ensures that only valid input are numbers 
                if(!($char_val >= 48 && $char_val <= 57)){
                    
                    $this->errors['rentalRate'] = "Rental rate field only accepts numbers as valid input.";
                    return false;
                }
            }
        }else if(!(strpos($rentalRateString,'.') >= strlen($rentalRateString) - 3)){
            
            $this->errors['rentalRate'] = "Rental rate field only accepts decimals with two digits after the decimal.";
            return false;

        }else{

            $rentalRateString = str_replace('.', '', $rentalRateString);
            //Iterates through each character in the string to valid them.
            for($i = 0; $i < strlen($rentalRateString);$i++){

                $char_val = ord($rentalRateString[$i]);

                //Ensures that only valid input are numbers 
                if(!($char_val >= 48 && $char_val <= 57)){
                    
                    $this->errors['rentalRate'] = "Rental rate field only accepts numbers as valid input.";
                    return false;
                }
            }
        }
       

        unset($this->errors['rentalRate']);
        return true;
    }

    //Validates additional charges input
    public function checkAdditionalCharges($additionalChargesString):bool{
    
        //Checks if the input is empty
        if($additionalChargesString == ''){

            $this->errors['additionalCharges'] = "Additional charges field is empty." ;
            return false;
        }

        //Removes all spaces 
        $additionalChargesString = str_replace(' ', '', $additionalChargesString);

        if(!str_contains($additionalChargesString,'.')){

            //Iterates through each character in the string to valid them.

            for($i = 0; $i < strlen($additionalChargesString);$i++){

                $char_val = ord($additionalChargesString[$i]);

                //Ensures that only valid input are numbers 
                if(!($char_val >= 48 && $char_val <= 57)){
                    
                    $this->errors['additionalCharges'] = "Additional charges field only accepts numbers as valid input.";
                    return false;
                }
            }
        }else if(!(strpos($additionalChargesString,'.') >= strlen($additionalChargesString) - 3)){
            
            $this->errors['additionalCharges'] = "Additional charges field only accepts decimals with two digits after the decimal.";
            return false;

        }else{

            $additionalChargesString = str_replace('.', '', $additionalChargesString);
            //Iterates through each character in the string to valid them.
            for($i = 0; $i < strlen($additionalChargesString);$i++){

                $char_val = ord($additionalChargesString[$i]);

                //Ensures that only valid input are numbers 
                if(!($char_val >= 48 && $char_val <= 57)){
                    
                    $this->errors['additionalCharges'] = "Additional charges field only accepts numbers as valid input.";
                    return false;
                }
            }
        }
       

        unset($this->errors['additionalCharges']);
        return true;
    }

    //Validation existing damages input
    public function checkExistingDamages($existingChargesString):bool{

        //Checks if existing damages input field is empty
        if($existingChargesString == ''){

            $this->errors['existingDamages'] = "Existing damages field is empty. If the vehicle has no existing damages then please input 'null'.";
            return false;
        }

        $existingChargesString = str_replace(' ','',$existingChargesString);

        //Iterates through each character to check if they are acceptable characters.
        for($i = 0 ; $i < strlen($existingChargesString); $i++){
            
            $char_val = ord($existingChargesString[$i]);
            
            //Ensures that only numbers and letters are valid.
            if(!($char_val  >= 48 && $char_val <= 57) && !($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['existingDamages'] = "Existing damages field only allows numbers and letters as valid inputs.";
                return false;
            }
        }

        unset($this->errors['existingDamages']);
        return true;
    }

    //Validation new damages input
    public function checkNewDamages($newDamagesString):bool{

        //Checks if existing charges input field is empty
        if($newDamagesString == ''){

            $this->errors['newDamages'] = "New damages field is empty. If the vehicle has no new damages then please input 'null'.";
            return false;
        }

        $newDamagesString = str_replace(' ','',$newDamagesString);

        //Iterates through each character to check if they are acceptable characters.
        for($i = 0 ; $i < strlen($newDamagesString); $i++){
            
            $char_val = ord($newDamagesString[$i]);
            
            //Ensures that only numbers and letters are valid.
            if(!($char_val  >= 48 && $char_val <= 57) && !($char_val >= 65 && $char_val <= 90) && !($char_val >= 97 && $char_val <= 122)){
                
                $this->errors['newDamages'] = "New damages field only allows numbers and letters as valid inputs.";
                return false;
            }
        }

        unset($this->errors['newDamages']);
        return true;
    }


/****************************
 ******** Accessors ********
*****************************/

    //Return all errors detected
    public function getErrors(){
        return $this->errors;
    }

}