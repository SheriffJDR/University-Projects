<?php
class Validate{
    public $error = array();

    public function checkId($id): bool{

        if(empty($id)){
            $this->error['id'] = "Please enter your id before attempting to log in.";
            return false;
        }
        if(preg_match("/\s/", $id)){
            $this->error["id"] = "id cannot contain spaces.";
            return false;
        }
        if(preg_match('/[^0-9]/',$id)){    
            $this->error["id"] = "Id must be numeric.";
            return false;
        }
        return true;

    }
    /*Password must be 12 characters in length
      Must contain at least one number
      Must containa at least one capital number
      Must contain at least one special character.
      No spaces*/

    public function checkPassword($password) : bool{

        if(empty($password)){
            $this->error["password"] = "Please enter a password before attemping to log in.";
            return false;
        }
        if(preg_match("/\s/", $password)){
            $this->error["password"] = "Password cannot contain spaces.";
            return false;
        }
        if(strlen($password) != 12){
            $this->error["password"] = "Password must be 12 characters in length. (current:". strlen($password).")";
            return false;
        }
        if(preg_match_all("/[A-Z]/", $password) < 1){
            $this->error["password"] = "Password must contain at least one capital letter.";
            return false;
        }
        if(preg_match_all("/[0-9]/", $password) < 1){
            $this->error["password"] = "Password must contain at least one number.";
            return false;
        }
        if(preg_match_all('/[@!#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $password) < 1){
            $this->error['password'] = 'Password must contain at least one special character.';
            return false;
        }
        return true;
    }

    //Helper function which checks if string contains numbers.
    public function containsNumbers(string $string):bool{

        if(preg_match_all("/[0-9]/", $string) >= 1){
            $this->error["password"] = "Password must contain at least one number.";
            return true;
        }
        else{
            return false;
        }
    }

    //Helper function which checks if string contains characters other than numbers.
    public function isNumeric(string $string):bool{

        if(preg_match_all("/[^0-9]/", $string) >= 1){

            return false;

        }
        return true;
    }
    //Helper function which checks if string contains speacial characters.
    public function hasSpecialCharacters(string $string):bool{

        if(preg_match_all('/[@!#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $string) >= 1){
            return true;
        }
        return false;
    }

    //Valdiates student id 
    public function checkStudentId(string $string):bool{
        //Checks if string is empty

        if(empty($string)){
            $this->error['error'] = "Please input a Student id.";
            return false;
        }
        if($this->isNumeric($string)){
            $this->error["error"] = "Student id must be a number";
            return false;
        }
    
        return true;
    }
    //Valdiates student name 
    public function checkStudentName(string $string):bool{
        //Checks if string is empty

        if(empty($string)){
            $this->error['error'] = "Please input a Student first name.";
            return false;
        }
        if(strlen($string) > 30){
            $this->error["error"] = "Student first name must be less than 30 characters in length.";
            return false;
        }
        if($this->hasSpecialCharacters($string)){
            $this->error["error"] = "Student first name cannot contain special characters.";
            return false;
        }
        if($this->containsNumbers($string)){
            $this->error["error"] = "Student first name cannot contain numbers.";
            return false;
        }
        return true;
    }
    //Valdiates club id 
    public function checkClubId(string $string):bool{
        //Checks if string is empty

        if(!$this->isNumeric($string)){
            $this->error["error"] = "Club id must be a number";
            return false;
        }
    
        return true;
    }
    //Valdiates club name 
    public function checkClubName(string $string):bool{
        //Checks if string is empty

        if(strlen($string) > 30){
            $this->error["error"] = "Club name must be less than 30 characters in length.";
            return false;
        }
        if($this->hasSpecialCharacters($string)){
            $this->error["error"] = "Club name cannot contain special characters.";
            return false;
        }
        if($this->containsNumbers($string)){
            $this->error["error"] = "Club name cannot contain numbers.";
            return false;
        }
        return true;
    }

    //Validates club Description data to be sent to the database
    public function checkClubDescription(string $string):bool{

        if(empty($string)){
            $this->error["error"] = "Please enter a club description.";
            return false;
        }if(strlen($string) > 1000){

            $this->error["error"] = "Club description cannot be more than 1000 character long.";
            return false;
        }

        return true;
    }
    //Validates the advisor id by determining if the id is valid and in the database
    public function checkAdvisorId(string $string):bool{

        if(empty($string)){
            $this->error["error"] = "Please enter an advisor id.";
            return false;
        }if(!$this->isNumeric($string)){
            $this->error["error"] = "Advisor id must be numeric";
            return false;
        }
        return true;
    }
    public function checkPayment(string $string):bool{
        //Only valdiate payment when input is given since payment field can be empty.
        if(!empty($string)){
            if(!is_numeric($string)){
                $this->error["error"] = "Payment must be numeric.";
                return false;
            }
        }
        return true;
    }
    //Validates both the payment description and the club description.
    public function checkPaymentDescription(string $string):bool{
        if(empty($string)){
            $this->error["error"] = "Please enter a payment description.";
            return false;

        }if(strlen($string) > 1000){

            $this->error["error"] = "Payment description cannot be more than 1000 character long.";
            return false;
        }
        return true;
    }

    //Ensures that the membership size field in the correct format.
    public function checkMembershipSize(string $string):bool{

        if(empty($string)){

            $this->error["error"] = "Please enter a membership size.";
            return false;
        }if(!$this->isNumeric($string)){

            $this->error["error"] = "Membership size must be a number.";
            return false;
        }
        return true;
    }
    //Ensures that the year group field in the correct format.
    public function checkYearGroup(string $string):bool{

        if(empty($string)){
            $this->error["error"] = "Please enter a year group.";
            return false;
        }if($this->isNumeric($string)){
            $this->error["error"] = "Year group must a number.";
            false;

        }if($string > 0 && $string < 4){
            $this->error["error"] = "Year group must be between 0 and 4 exclusive.";
            false;
        }
        return true;
    }

    //Ensures that the meeting day date is in the corrent format.
    public function checkMeetingLocation(string $string):bool{

        if(empty($string)){

            $this->error["error"] = "Please enter a meeting location.";
            return false;
        }
        if($this->hasSpecialCharacters($string)){
            
            $this->error["error"] = "Meeting location must not contain special characters.";
            return false;
        }
        return true;
    }
    public function checkMeetingTime(string $string):bool{

        if(empty($string)){

            $this->error["error"] = "Please enter a meeting time.";
            return false;
        }
    
        return true;
    }

    public function getErrors() : array{
        return $this->error;
    }
}