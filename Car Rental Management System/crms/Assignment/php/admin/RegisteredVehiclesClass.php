<?php

class RegisteredVehicles{

    private $_mysqli;
    private $errors;
    private $records = [];

    /*Creates a mysqli database connection to the vrlms database 
    and stores the connection in the classes private property $_mysqli.*/

    public function dbConnect($host, $user,$pass){

        try{
            //Establishes database connection using PDO handler
            $this->_mysqli = new mysqli($host,$user,null,'vlrms');

            //Errors checking for database connection
            if($this->_mysqli->connect_errno){
                $this->errors['Database'] = $pdo->connect_error;
                exit;
            }
           
        }catch(PDOException $e){

            $this->errors['Database'] = 'Could not connect to database';
            die($e->getMessage());
            mysqli_close($pdo);

        }
    }

    public function getRegisteredDrivers():array{
        

        if($this->_mysqli == null){
            $errors['Database'] = "Could not connect to database";
            exit;
        }
        $query = "SELECT * FROM drivers AS d, vehicles AS v WHERE d.national_id = v.national_id";

        $results = $this->_mysqli->query($query);
        $count = 0;

        if($results->num_rows > 0){
            
            while($row = $results->fetch_assoc()){

                $this->records[$count]["registration_no"] = $row["registration_no"];
                $this->records[$count]["manu"]  = $row["manufacturer"];
                $this->records[$count]["make"] = $row["make"];
                $this->records[$count]["Model"] = $row["model"];
                $this->records[$count]["Year"] = $row["year"];
                $this->records[$count]["national_id"] = $row["national_id"];
                $this->records[$count]["Driver"] = "{$row["first_name"]} {$row["last_name"]}";
                $count++;
                
            }

        }
        return $this->records;
    }

    public function getErrors(){
        return $this->errors;
    }
    
    public function getRecords(){
        return $this->records;
    }
}