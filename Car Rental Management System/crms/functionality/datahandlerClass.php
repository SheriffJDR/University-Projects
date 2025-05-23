<?php

class handler{
    
    private $data = array();
    private $errors;


    //Constructor
    public function __construct(){
        //Starts session
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

/*****************************************
VEHICLES SECTIONS 
*****************************************/
    public function getVehiclesRentedToday(string $data): int{
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM rentals WHERE rental_start_date = '{$data}'";
           
            //Stores result of sql query
            $result = $pdo->query($query);
            echo $result->num_rows;

            //Checks if the submitted 
            $pdo = null;
            return $result->num_rows;

        }catch(PDOException $e){

            $this->errors['rented_Today'] = 'Sorry could not retrieve data from database.';
            die($e->getMessage());
            mysqli_close($pdo);
        }
        
    }

    //Adds a new vehicle record to the database
    public function addVehicle(){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');
    
            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }
    
            //Get Vehicle Form Data
            $make = $_POST['make'];
            $model = $_POST['model'];
            $year = $_POST['year'];
            $vin = $_POST['vin'];
            $interior = $_POST['interiorColor'];
            $exterior = $_POST['exteriorColor'];
            $plate = $_POST['licensePlate'];
            $odometer = $_POST['odometer'];
            $availability = $_POST['availability'];
            $dueDate = $_POST['dueDate'];

            /*Checks if there is already a record in the database 
            with a vin matching the edited record's new vin plate*/

            $sql = "SELECT * from vehicles WHERE vin = '$vin'";
            $result = $pdo->query($sql);
            
            if($result->num_rows >= 1){
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "Cannot insert a vehicle record which carries a vin that already exists in the system.";
                return;
            }

            /*Checks if there is already a record in the database 
            with a license plate matching the edited record's new license plate*/

            $sql = "SELECT * from vehicles WHERE license_plate = '$plate'";
            $result = $pdo->query($sql);

            if($result->num_rows >= 1){
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "Cannot insert a vehicle record which carries a license plate number that already exists in the system.";
                return;
            }

            //SQL Query to add data into database
            //Checks if the date field is NULL or not
            if($availability == 'available'){
                $sql = "INSERT INTO vehicles (make, model, year, vin, interior_color,
                exterior_color, license_plate, odometer, availability, 
                due_date) VALUES ( '$make', '$model','$year','$vin','$interior', '$exterior',
                '$plate', '$odometer','$availability',NULL)";
            }
            else{
                $sql = "INSERT INTO vehicles (make, model, year, vin, interior_color,
                exterior_color, license_plate, odometer, availability, 
                due_date) VALUES ( '$make', '$model','$year','$vin','$interior', '$exterior',
                '$plate', '$odometer','$availability','$dueDate')";
            }

            echo($sql);
    
            if (mysqli_query($pdo, $sql)) {
                 echo "Data inserted successfully";
            } else {
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "We are sorry, the system was unable to add the record to the system.";
                exit();
            }
    
            mysqli_close($pdo);
    
    
        }catch(PDOException $e){
    
            $this->errors['data_retrieval'] = 'Data Insertion failed!';
            $this->errors['error_message'] = 'We are sorry, the system was unable to add the record to the system.';
            die($e->getMessage());
            mysqli_close($pdo);
        }
    }

    //Returns all of the vehicle records present in the database.
    public function getAllVehicles(){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM vehicles";
           
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if($result->num_rows > 0){
            
                //Fetches all records from vehicle table
                while($rows = $result->fetch_assoc()){
                    $this->data[] = array("vehicle_id" => $rows['vehicle_id'],
                    "make" => $rows['make'],
                    "model" => $rows['model'],
                    "year" => $rows['year'], 
                    "vin" => $rows['vin'], 
                    "interior_color" => $rows['interior_color'],
                    "exterior_color" => $rows['exterior_color'],
                    "license_plate" => $rows['license_plate'],
                    "odometer" => $rows['odometer'],
                    "availability" => $rows['availability'], 
                    "due_date" => $rows['due_date']);
                }
            
          

                // echo $_SESSION['vehicles']['vehicle_id'];
                // echo $_SESSION['vehicles']['make'];
                // echo $_SESSION['vehicles']['model'];
                // echo $_SESSION['vehicles']['year'];
                
                //Frees resources
                $pdo = null;
            }
            else{
                $this->errors['data_retrieval'] = 'Data retrieval failed.';
                $this->errors['error_message'] = "We are sorry, they are currently no vehicle records present in the database at the moment.";
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Database Error!';
            $this->errors['error_message'] = 'Data retrieval failed.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Returns a vehilcle record mathching the vehicle ID passed into the function.
    public function getVehicleRecord($id){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM vehicles WHERE vehicle_id = '{$id}'";
            
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if($result->num_rows == 1){
            
                //Fetches all records from vehicle table
                while($rows = $result->fetch_assoc()){

                    $this->data[] = array("vehicle_id" => $rows['vehicle_id'],
                    "make" => $rows['make'],
                    "model" => $rows['model'],
                    "year" => $rows['year'], 
                    "vin" => $rows['vin'],
                    "interior_color" => $rows['interior_color'], 
                    "exterior_color" => $rows['exterior_color'], 
                    "license_plate" => $rows['license_plate'],
                    "odometer" => $rows['odometer'],
                    "availability" => $rows['availability'],
                    "due_date" => $rows['due_date']);
                }
            
        
                //print_r($data);
                // echo $data['customers'][0]['first_name'];
                // echo $data['customers'][0]['last_name'];
                // echo $data['customers'][0]['address'];
                // echo $_SESSION['customers']['model'];
                // echo $_SESSION['customers']['year'];
                
                //Frees resources
                $pdo = null;
            }
            else{
                $this->errors['data_retrieval'] = 'Record retrieval failed.';
                $this->errors['error_message'] = 'We are sorry,but it seems that the system could not retrieve the record.';
                exit();
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Record retrieval failed.';
            $this->errors['error_message'] = 'We are sorry,but it seems that the system could not connect to the database.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

     //Edits a vehicle record present in the database.
     public function editVehicleRecord($data){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            // $sql = "SELECT due_date from vehicles WHERE vehicle_id = '{$data['vehicleId']}'";
            // $result = $pdo->query($sql);
            // $rows = $result->fetch_assoc();
            // if($rows['']){

            // }
            /*Checks if there is already a record in the database 
            with a vin matching the edited record's new vin plate*/

            $sql = "SELECT * from vehicles WHERE vin = '{$data['vin']}' AND vehicle_id = 'vehicle_id'";
            $result = $pdo->query($sql);

            if($result->num_rows >= 1){
                $this->errors['data_retrieval'] = 'Data Edit failed!';
                $this->errors['error_message'] = "Unable to change a vehicle record's vin to match the vin of another record that already exists.";
                return;
            }

            /*Checks if there is already a record in the database 
            with a license plate matching the edited record's new license plate*/
            $sql = "SELECT * from vehicles WHERE license_plate = '{$data['licensePlate']}' AND vehicle_id = 'vehicle_id' ";
            $result = $pdo->query($sql);

            if($result->num_rows >= 1){
                $this->errors['data_retrieval'] = 'Data Edit failed!';
                $this->errors['error_message'] = "Unable to change a license plate vin to match the license plate of another record that already exists.";
                return;
            }
            //Sends Msql query to the database
            //Checks if the date field is NULL or not
            if($availability == 'available'){
                $query = "UPDATE vehicles SET make = '{$data['make']}' , 
                model = '{$data['model']}' , year = '{$data['year']}',
                vin = '{$data['vin']}' , interior_color = '{$data['interiorColor']}',
                exterior_color = '{$data['exteriorColor']}' , license_plate = '{$data['licensePlate']}' ,
                odometer = '{$data['odometer']}' ,availability = '{$data['availability']}',
                due_date = NULL WHERE vehicle_id = '{$data['vehicleId']}'";
            }
            else{
                $query = "UPDATE vehicles SET make = '{$data['make']}' , 
                model = '{$data['model']}' , year = '{$data['year']}',
                vin = '{$data['vin']}' , interior_color = '{$data['interiorColor']}',
                exterior_color = '{$data['exteriorColor']}' , license_plate = '{$data['licensePlate']}' ,
                odometer = '{$data['odometer']}' ,availability = '{$data['availability']}',
                due_date = '{$data['dueDate']}' WHERE vehicle_id = '{$data['vehicleId']}'";
            }
            

            echo($query);
            //$result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if ($pdo->query($query) === TRUE) {
                echo "Record updated successfully";
              } 
            else{
                $this->errors['data_retrieval'] = 'Data update failed.';
                $this->errors['error_message'] = 'We are sorry,but it seems that the system could not update the record.';
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Data update failed.';
            $this->errors['error_message'] = 'We are sorry,but it seems that the system not connect to the database.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Deletes a vehicle record present in the database.
    public function deleteVehicleRecord($data){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "DELETE FROM vehicles WHERE vehicle_id = '{$data['vehicleId']}'";
           
            //$result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if ($pdo->query($query) === TRUE) {
                echo "Record updated successfully";
              } 
            else{
                $this->errors['data_retrieval'] = 'Vehicle removal failed.';
                $this->errors['error_message'] = 'We are sorry,but it seems that the system could not find the record to be deleted.';
                exit();
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Vehicle removal failed.';
            $this->errors['error_message'] = 'We are sorry,but it seems that the system not connect to the database.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

/*****************************************
CUSTOMERS SECTIONS 
*****************************************/

    //Adds a new customer record to the database
    public function addCustomer(){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');
    
            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }
    
            //Get Customer Form Data
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $licensenumber = $_POST['licenseNumber'];
            $State = $_POST['issue'];
            $dexpiry = $_POST['dExpiry'];
            $cardNumber = $_POST['cardNumber'];
            $cexpiry = $_POST['cExpiry'];
            $billingAddress = $_POST['billingAddress'];
            $preferredVehicle = $_POST['preferredVehicle'];
            $duration = $_POST['duration'];
            $PickUp = $_POST['pickUp'];
            $DropOff = $_POST['dropOff'];

            /*Checks if there is already a record in the database 
            with a credit card number matching the edited record's new credit card number*/

            $sql = "SELECT * from customers WHERE credit_card_num = '$cardNumber'";
            $result = $pdo->query($sql);

            if($result->num_rows >= 1){
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "Cannot insert a customer record which carries a credit card number that already exists in the system.";
                return;
            }


            /*Checks if there is already a record in the database 
            with a drivers license number matching the edited record's new drivers license number*/

            $sql = "SELECT * from customers WHERE drivers_license_num = '$licensenumber'";
            $result = $pdo->query($sql);

            if($result->num_rows >= 1){
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "Cannot insert a customer record which carries a driver's license number that already exists in the system.";
                return;
            }
    
            //SQL Query to add data into database
            $sql = "INSERT INTO customers (first_name, last_name, address, city, email, 
            phone_number, drivers_license_num, drivers_license_state, 
            drivers_license_exp_date, credit_card_num, credit_card_exp_date,
            billing_address, preferred_vehicle_type, rental_duration, 
            pickup_location, dropoff_location) VALUES ( '$firstname', '$lastname','$address','$city','$email', '$phoneNumber',
            '$licensenumber', '$State','$dexpiry','$cardNumber','$cexpiry','$billingAddress', '$preferredVehicle', '$duration','$PickUp', '$DropOff')";
    
    
            if (mysqli_query($pdo, $sql)) {
                echo "Data inserted successfully";
            } else {
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "We are sorry, the system was unable to add the record to the system.";
                exit();
            }
    
            mysqli_close($pdo);
    
    
        }catch(PDOException $e){
    
            $this->errors['data_retrieval'] = 'Data Insertion failed!';
            $this->errors['error_message'] = 'We are sorry, the system was unable to add the record to the system.';
            die($e->getMessage());
            mysqli_close($pdo);
        }
    }
    
    //Returns all of the customer records present in the database.
    public function getAllCustomers(){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM customers";
           
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if($result->num_rows > 0){
            
                //Fetches all records from vehicle table
                while($rows = $result->fetch_assoc()){

                    $this->data[] = array("customer_id" => $rows['customer_id'],
                    "first_name" => $rows['first_name'],
                    "last_name" => $rows['last_name'],
                    "address" => $rows['address'], 
                    "city" => $rows['city'], 
                    "email" => $rows['email'], 
                    "phone_number" => $rows['phone_number'],
                    "drivers_license_num" => $rows['drivers_license_num'],
                    "drivers_license_state" => $rows['drivers_license_state'],
                    "drivers_license_exp_date" => $rows['drivers_license_exp_date'],
                    "credit_card_num" => $rows['credit_card_num'],
                    "credit_card_exp_date" => $rows['credit_card_exp_date'],
                    "billing_address" => $rows['billing_address'],
                    "preferred_vehicle_type" => $rows['preferred_vehicle_type'],
                    "rental_duration" => $rows['rental_duration'],
                    "pickup_location" => $rows['pickup_location'],
                    "dropoff_location" => $rows['dropoff_location'],);
                }
            
          

                //print_r($data);
                // echo $data['customers'][0]['first_name'];
                // echo $data['customers'][0]['last_name'];
                // echo $data['customers'][0]['address'];
                // echo $_SESSION['customers']['model'];
                // echo $_SESSION['customers']['year'];
                
                //Frees resources
                $pdo = null;
            }
            else{
                $this->errors['data_retrieval'] = 'Database Empty!';
                $this->errors['error_message'] = "We are sorry, they are currently no customer records present in the database at the moment.";               
                $pdo = null;
                //exit();
                
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Database Error!';
            $this->errors['error_message'] = 'Data retrieval failed.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Returns a customer record mathching the customer ID passed into the function.
    public function getCustomerRecord($id){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM customers WHERE customer_id = '{$id}'";
           
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if($result->num_rows == 1){
            
                //Fetches all records from vehicle table
                while($rows = $result->fetch_assoc()){

                    $this->data[] = array("customer_id" => $rows['customer_id'],
                    "first_name" => $rows['first_name'],
                    "last_name" => $rows['last_name'],
                    "address" => $rows['address'], 
                    "city" => $rows['city'], 
                    "email" => $rows['email'], 
                    "phone_number" => $rows['phone_number'],
                    "drivers_license_num" => $rows['drivers_license_num'],
                    "drivers_license_state" => $rows['drivers_license_state'],
                    "drivers_license_exp_date" => $rows['drivers_license_exp_date'],
                    "credit_card_num" => $rows['credit_card_num'],
                    "credit_card_exp_date" => $rows['credit_card_exp_date'],
                    "billing_address" => $rows['billing_address'],
                    "preferred_vehicle_type" => $rows['preferred_vehicle_type'],
                    "rental_duration" => $rows['rental_duration'],
                    "pickup_location" => $rows['pickup_location'],
                    "dropoff_location" => $rows['dropoff_location'],);
                }
            
          

                //print_r($data);
                // echo $data['customers'][0]['first_name'];
                // echo $data['customers'][0]['last_name'];
                // echo $data['customers'][0]['address'];
                // echo $_SESSION['customers']['model'];
                // echo $_SESSION['customers']['year'];
                
                //Frees resources
                $pdo = null;
            }
            else{
                $this->errors['data_retrieval'] = 'Record retrieval failed.';
                $this->errors['error_message'] = 'We are sorry,but it seems that the system could not retrieve the record.';
                exit();
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Record retrieval failed.';
            $this->errors['error_message'] = 'We are sorry,but it seems that the system could not connect to the database.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Edits a cutomer record present in the database.
    public function editCustomerRecord($data){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            /*Checks if there is already a record in the database 
            with a credit card number matching the edited record's new credit card number*/

            $sql = "SELECT * from customers WHERE credit_card_num = '{$data['cardNumber']}'";
            $result = $pdo->query($sql);

            if($result->num_rows >= 1){
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "Cannot insert a customer record which carries a credit card number that already exists in the system.";
                return;
            }


            /*Checks if there is already a record in the database 
            with a drivers license number matching the edited record's new drivers license number*/

            $sql = "SELECT * from customers WHERE drivers_license_num = '{$data['licenseNumber']}'";
            $result = $pdo->query($sql);

            if($result->num_rows >= 1){
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "Cannot insert a customer record which carries a driver's license number that already exists in the system.";
                return;
            }

            //Sends Msql query to the database
            $query = "UPDATE customers SET first_name = '{$data['firstname']}' , 
            last_name = '{$data['lastname']}' , address = '{$data['address']}',
            city = '{$data['city']}' , email = '{$data['email']}',
            phone_number = '{$data['phoneNumber']}' , drivers_license_num = '{$data['licenseNumber']}' ,
            drivers_license_state = '{$data['issue']}' ,
            drivers_license_exp_date = '{$data['dExpiry']}' ,
            credit_card_num = '{$data['cardNumber']}' ,
            credit_card_exp_date = '{$data['cExpiry']}',
            billing_address = '{$data['billingAddress']}', preferred_vehicle_type = '{$data['preferredVehicle']}',
            rental_duration = '{$data['duration']}', pickup_location = '{$data['pickUp']}',
            dropoff_location = '{$data['dropOff']}' WHERE customer_id = '{$data['customerId']}'";
           
            //$result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if ($pdo->query($query) === TRUE) {
                echo "Record updated successfully";
              } 
            else{
                $this->errors['data_retrieval'] = 'Data update failed.';
                $this->errors['error_message'] = 'We are sorry,but it seems that the system could not retrieve the record.';
                exit();
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Data update failed.';
            $this->errors['error_message'] = 'We are sorry,but it seems that the system not connect to the database.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Deletes a cutomer record present in the database.
    public function deleteCustomerRecord($data){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "DELETE FROM customers WHERE customer_id = '{$data['customerId']}'";
           
            //$result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if ($pdo->query($query) === TRUE) {
                echo "Record updated successfully";
              } 
            else{
                $this->errors['data_retrieval'] = 'Customer removal failed.';
                $this->errors['error_message'] = 'We are sorry,but it seems that the system could not find the record to be deleted.';
                exit();
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Customer removal failed.';
            $this->errors['error_message'] = 'We are sorry,but it seems that the system not connect to the database.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }


/*****************************************
RENTAL/RETURNS SECTIONS 
*****************************************/

    //Returns total number vehicles currently rented out the database.
    public function getVehiclesOnRental() {

        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM vehicles WHERE availability = 'rented' ";
           
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Returns number of vehicles that have been rented 
            $this->data['data'] = $result->num_rows;

        }catch(PDOException $e){

            $this->errors['data'] = 'N/A';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Reuturns total number of available vehicles the database.
    public function getAvailableVehicles(){
        
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM vehicles WHERE availability = 'available' ";
           
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Returns number of vehicles that have been rented 
            $this->data['data'] = $result->num_rows;

        }catch(PDOException $e){

            $this->errors['data'] = 'N/A';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Returns total number of  cars to be returned on the current date from the database.
    public function getVehicleToBeReturnedToday(){

        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sets default timezone to Atlantic standard time
            date_default_timezone_set('America/Barbados');

            //Gets time
            $date = date('o-m-d');

            //Sends Msql query to the database
            $query = "SELECT * FROM vehicles WHERE due_date = '{$date}' ";
           
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Returns number of vehicles that have been rented 
            $this->data['data'] = $result->num_rows;

        }catch(PDOException $e){

            $this->errors['data'] = 'N/A';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Returns all of the rental records present in the database.
    public function getAllRentals(){

        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM rentals";
           
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if($result->num_rows > 0){
            
                //Fetches all records from rentals table
                while($rows = $result->fetch_assoc()){

                    $this->data[] = array("rental_id" => $rows['rental_id'],
                    "customer_id" => $rows['customer_id'],
                    "vehicle_id" => $rows['vehicle_id'],
                    "rental_start_date" => $rows['rental_start_date'], 
                    "rental_end_date" => $rows['rental_end_date'], 
                    "rental_rate" => $rows['rental_rate'], 
                    "outstanding_balances" => $rows['outstanding_balances']);
                }
            
                //Frees resources
                $pdo = null;
            }
            else{
                $this->errors['data_retrieval'] = 'Database Empty!';
                $this->errors['error_message'] = "We are sorry, they are currently no rental records present in the database at the moment.";               
                $pdo = null;
                //exit();
                
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Database Error!';
            $this->errors['error_message'] = 'Data retrieval failed.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }

    }

    ////Adds a new rental record to the database
    public function addRental(){
        //Sets default timezone to Atlantic standard time
        date_default_timezone_set('America/Barbados');

        //Gets time
        $date = date('o-m-d'); 

        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Get Customer Form Data
            $customerId = $_POST['customerId'];
            $vehicleId = $_POST['vehicleId'];
            $employeeId = $_POST['employeeId'];
            $vehicleStatus = $_POST['vehicleStatus'];
            $rentalStart = $_POST['rentalStart'];
            $rentalEnd = $_POST['rentalEnd'];
            $outstandingBalances = $_POST['outstandingBalances'];
            $rentalRate = $_POST['rentalRate'];
            $additionalCharges = $_POST['additionalCharges'];
            $existingDamages = $_POST['existingDamages'];
            $newDamages = $_POST['newDamages'];


            //checks if car in already rented 
            $sql = "SELECT * from vehicles WHERE vehicle_id = '$vehicleId' AND availability = 'rented'";

            $result = $pdo->query($sql);
            
            if($result->num_rows > 0){

                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "We are sorry, you can rent out a vehicle that is already rented.";
                return;
            }


            //SQL Query to add data into database
            $sql = "INSERT INTO rentals (customer_id, vehicle_id, employee_id, vehicle_status, rental_start_date, 
            rental_end_date, outstanding_balances, rental_rate, 
            additional_charges, existing_damages, new_damages , date_rented) VALUES ( '$customerId', '$vehicleId','$employeeId','$vehicleStatus','$rentalStart', '$rentalEnd',
            '$outstandingBalances', '$rentalRate','$additionalCharges','$existingDamages','$newDamages','$date')";


            if (mysqli_query($pdo, $sql)) {
                echo "Data inserted successfully";
            } else {
                $this->errors['data_retrieval'] = 'Data Insertion failed!';
                $this->errors['error_message'] = "We are sorry, the system was unable to add the record to the system.";
                exit();
            }

            mysqli_close($pdo);


        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Data Insertion failed!';
            $this->errors['error_message'] = 'We are sorry, the system was unable to add the record to the system.';
            die($e->getMessage());
            mysqli_close($pdo);
        }
    }

    //Deletes a rental record present in the database.
    public function deleteRentalRecord($data){
        
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "DELETE FROM rentals WHERE rental_id = '{$data['rental_id']}'";
           
            //$result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if ($pdo->query($query) === TRUE) {
                echo "Record updated successfully";
              } 
            else{
                $this->errors['data_retrieval'] = 'Customer removal failed.';
                $this->errors['error_message'] = 'We are sorry,but it seems that the system could not find the record to be deleted.';
                exit();
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Customer removal failed.';
            $this->errors['error_message'] = 'We are sorry,but it seems that the system not connect to the database.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    //Returns a rental record based on id
    public function getRentalRecord($id){
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sends Msql query to the database
            $query = "SELECT * FROM rentals WHERE rental_id = '{$id}'";
           
            $result = $pdo->query($query);
            //echo $result->num_rows;

            //Checks if the submitted 
            if($result->num_rows == 1){
            
                //Fetches all records from vehicle table
                while($rows = $result->fetch_assoc()){

                    $this->data[] = array("rental_id" => $rows['rental_id'],
                    "customer_id" => $rows["customer_id"],
                    "vehicle_id" => $rows['vehicle_id'],
                    "employee_id" => $rows['employee_id'],
                    "vehicle_status" => $rows['vehicle_status'], 
                    "rental_start_date" => $rows['rental_start_date'], 
                    "rental_end_date" => $rows['rental_end_date'], 
                    "outstanding_balances" => $rows['outstanding_balances'],
                    "rental_rate" => $rows['rental_rate'],
                    "additional_charges" => $rows['additional_charges'],
                    "existing_damages" => $rows['existing_damages'],
                    "new_damages" => $rows['new_damages']);
                }
            

                //Frees resources
                $pdo = null;
            }
            else{
                $this->errors['data_retrieval'] = 'Record retrieval failed.';
                $this->errors['error_message'] = 'We are sorry,but it seems that the system could not retrieve the record.';
                exit();
                $pdo = null;
            }

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Record retrieval failed.';
            $this->errors['error_message'] = 'We are sorry,but it seems that the system could not connect to the database.';
            die($e->getMessage());
            mysqli_close($pdo);    
        }
    }

    public function getCarRentalHistory(){

    }

    public function getMostPopularModel(){

    }
//useful functions
    public function getRecentRentals($id){

        //Sets default timezone to Atlantic standard time
        date_default_timezone_set('America/Barbados');

        //Gets time
        $date = date('o-m-d');
        try{
            //Establishes database connection using PDO handler
            $pdo = new mysqli('localhost','root',null,'crms');

            //Errors checking for database connection
            if($pdo->connect_errno){
                echo'Database connection error: '.$pdo->connect_error;
                exit;
            }

            //Sets default timezone to Atlantic standard time
            date_default_timezone_set('America/Barbados');

            //Gets time
            $date = date('o-m-d');

            //Sends Msql query to the database
            $query = "SELECT * FROM rentals WHERE employee_id = '{$id}' ORDER BY date_rented ASC";
           
            $result = $pdo->query($query);

            //Checks if the submitted 
            if($result->num_rows > 0){
                
                //Fetches all records from rentals table
                while($rows = $result->fetch_assoc()){

                    $this->data[] = array("rental_id" => $rows['rental_id'],
                    "customer_id" => $rows["customer_id"],
                    "vehicle_id" => $rows['vehicle_id'],
                    "employee_id" => $rows['employee_id'],
                    "vehicle_status" => $rows['vehicle_status'], 
                    "rental_start_date" => $rows['rental_start_date'], 
                    "rental_end_date" => $rows['rental_end_date'], 
                    "outstanding_balances" => $rows['outstanding_balances'],
                    "rental_rate" => $rows['rental_rate'],
                    "additional_charges" => $rows['additional_charges'],
                    "existing_damages" => $rows['existing_damages'],
                    "new_damages" => $rows['new_damages'],
                    "date_rented" => $rows['date_rented']);
                }
            
                //Frees resources
                $pdo = null;
            }
            else{
                $this->errors['data_retrieval'] = 'Database Empty!';
                $this->errors['error_message'] = "We are sorry, they are currently no rental records present in the database at the moment.";               
                $pdo = null;
                //exit();
                
            }
            //echo $result->num_rows;

        }catch(PDOException $e){

            $this->errors['data_retrieval'] = 'Database Error!';
            $this->errors['error_message'] = 'Data retrieval failed.';
            die($e->getMessage());
            mysqli_close($pdo);
        }

    }

    //Accessors
    public function getData(){
        return $this->data;
    }

    public function getErrors(){
        return $this->errors;
    }

}