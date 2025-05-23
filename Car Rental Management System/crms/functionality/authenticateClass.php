<?php
 include_once 'validateClass.php';

class authenticateClass{

    private $errors;

//Checks if a session has been started and if not creates one
    public function __construct(){
       
        //Starts session
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function loginUser(array $data){

        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM employee WHERE Employee_id = '{$data['employee_id']}' AND Password = '{$data['password']}'";
           
            $result = $pdo->query($query);
            echo $result->num_rows;

            //Checks if the submitted 
            if($result->num_rows == 1){
            
                //Sets default timezone to Atlantic standard time
                date_default_timezone_set('America/Barbados');

                //Gets time 
                $time = date('d-m-o-g:ia');

                //Ensures that the session_user can only be set once per session
                if(isset($_SESSION['session_user']['employee_id'])){
                    $this->errors['Credentials'] = 'User already logged';
                    header("Location:../template/index.php?=" . http_build_query($this->errors));
                    return;
                }
                if(isset($_SESSION['session_user']['first_name'])){
                    $this->errors['Credentials'] = 'User already logged';
                    header("Location:../template/index.php?=" . http_build_query($this->errors));
                    return;
                }
                if(isset($_SESSION['session_user']['last_name'])){
                    $this->errors['Credentials'] = 'User already logged';
                    header("Location:../template/index.php?=" . http_build_query($this->errors));
                    return;
                }
                if(isset($_SESSION['session_user']['time'])){
                    $this->errors['Credentials'] = 'User already logged';
                    header("Location:../template/index.php?=" . http_build_query($this->errors));
                    return;
                }
                
                //Adds data to global session variable
                $rows = $result->fetch_assoc();

                // $_SESSION['session_user']['employee_id'] = $rows['employee_id'];
                // $_SESSION['session_user']['first_name'] = $rows['first_name'];
                // $_SESSION['session_user']['last_name'] = $rows['last_name'];
                // $_SESSION['session_user']['time'] = $time;

                $_SESSION['session_user'] = array("employee_id" => $rows['Employee_id'],
                "first_name" => $rows['first_name'],
                "last_name" => $rows['last_name'],
                "time" => $time
            );

                echo $_SESSION['session_user']['employee_id'];
                echo $_SESSION['session_user']['first_name'];
                echo $_SESSION['session_user']['last_name'];
                echo $_SESSION['session_user']['time'];
                
                //Frees resources
                $pdo = null;
            }
            else{
                $this->errors['Credentials'] = 'Invalid login credentials';
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['Credentials'] = 'Invalid login credentials';
            die($e->getMessage());
            mysqli_close($pdo);

        }
        
    }

    public function isUserLoggedIn():bool{
        //11000907DRVR
        //secur3Acc3s5

        //Checks if the $session_user session variable exists
        if(!isset($_SESSION['session_user'])){
            
            return false;
        }
        if(isset($_SESSION['session_user'])){
            
            $isvalid = new validateClass();

            //Checks if employeeid is valid 
            if($isvalid->checkEmployeeID($_SESSION['session_user']['employee_id'])){

                return true;

            }else{
       
                return false;
            }
        }
    }

    public function getUserInfo(string $field):string{

        if(!($field == 'eno') && !($field == 'fname') && !($field == 'lname') && !($field == 'time'))
        {
            $this->errors["userInfo"] = "Unknown field: Info could not be found";
        }
        else if($field == 'eno'){

            //Returns employee Id of the user logged in
            return $_SESSION['session_user']['employee_id'];
        }
        else if($field == 'fname'){

            //Returns the first name of the user logged in
            return $_SESSION['session_user']['first_name'];
        }
        else if($field == 'lname'){

            //Returns the last name of the user logged in 
            return $_SESSION['session_user']['last_name'];
        }
        else if($field == 'time'){

            //Returns the time the user logged in
            return $_SESSION['session_user']['time'];
        }

    }

    public function logOutUser(){

        //session_unset();

        // //Removes all session varibles
        session_destroy();

        // //Removes sessions
        //session_abort();
        
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        //Redirects user to the index page
        header("Location:../template/index.php");
    }

    public function getErrors(){
        return $this->errors;
    }
}