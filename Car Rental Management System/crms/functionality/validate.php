<?php
session_start();

require 'validateClass.php';

//Creates an ValidateClass object to validate data from the form 
$isValid = new validateClass();


//Checks if data has been posted to the server
if(empty($_POST)){

    //Redirects user to error page
    header('Location:../template/404.php');
    exit();
}

//$_SESSION['validation_type'] = $_POST['validation_type']

if(!isset($_POST['validatorMethod'])){

    //Redirects user to error page is validating module fails.
    header('Location:../template/404.php');
    exit();
}

if($_POST['validatorMethod'] == 'login'){

    
    $isValid = new validateClass();

    //Returns error messages if any validation failures are detected
    if(!($isValid->checkEmployeeId($_POST["employee_id"]))||!($isValid->checkPassword($_POST["password"]))){
        
        //Gets the errors produced during validation
        $errorMessages = $isValid->getErrors();
        unset($isValid);

        //Passes the errors to be displayed back to the index page as an encoded query string
        header('Location:../template/index.php?='. http_build_query($errorMessages));

        exit;
    }
    else{
        //Matching
        require 'authenticate.php';
    
    }
}else if($_POST['validatorMethod'] == 'vehicle'){
    
    //Runs validation on the form inputs
    if(!($isValid->checkMake($_POST['make'])) || !($isValid->checkModel($_POST['model'])) 
    || !($isValid->checkYear($_POST['year'])) || !($isValid->checkVin($_POST['vin'])) || 
    !($isValid->checkInteriorColor($_POST['interiorColor'])) || !($isValid->checkExteriorColor($_POST['exteriorColor'])) 
    || !($isValid->checkLicensePlate($_POST['licensePlate'])) || !($isValid->checkOdometer($_POST['odometer']))){

        //Gets the errors produced during validation
        $errorMessages = $isValid->getErrors();
        print_r($isValid->getErrors());
        unset($isValid);
        
        //Unsets data input to database error 
        if(isset($_SESSION['errors'])){
            unset($_SESSION['errors']);
        }
        else{
            echo ("No data input error");
        }

        $_SESSION['validationError'] = $errorMessages;
        //Passes the errors to be displayed back to the vehicle page as an encoded query string
        header('Location:../template/vehicles.php');
    }else{
        
        if(isset($_SESSION['validationError'])){
            unset($_SESSION['validationError']);
        }
        require 'handler.php';
    }

}else if($_POST['validatorMethod'] == 'vehicleEdit'){

    //Passes the vehicle id to session super global to be used to retrieve data from the database.
    $_SESSION['vehicleId'] = $_POST['vehicleId'];
    echo($_SESSION['vehicleId']);
    //Removes previous stored form validation errors
    if(isset($_SESSION['validationError'])){
        unset($_SESSION['validationError']);
    }

    //Runs validation on the form inputs
    if(!($isValid->checkMake($_POST['make'])) || !($isValid->checkModel($_POST['model'])) 
    || !($isValid->checkYear($_POST['year'])) || !($isValid->checkVin($_POST['vin'])) || 
    !($isValid->checkInteriorColor($_POST['interiorColor'])) || !($isValid->checkExteriorColor($_POST['exteriorColor'])) 
    || !($isValid->checkLicensePlate($_POST['licensePlate'])) || !($isValid->checkOdometer($_POST['odometer']))){

        //Gets the errors produced during validation
        $errorMessages = $isValid->getErrors();
        print_r($isValid->getErrors());
        unset($isValid);
        
        //Unsets data input to database error 
        if(isset($_SESSION['errors'])){
            unset($_SESSION['errors']);
        }
        else{
            echo ("No data input error");
        }

        $_SESSION['validationError'] = $errorMessages;

        //Passes the errors to be displayed back to the vehicle page as an encoded query string
        header('Location:../template/vehiclesEdit.php');
    }else{
        
        //Removes previous stored form validation errors
        if(isset($_SESSION['validationError'])){
            unset($_SESSION['validationError']);
        }
        
        //Passes off processing to data handler
        require 'handler.php';
    }
}else if($_POST['validatorMethod'] == 'customer'){
    
    //Runs validation on the form inputs
    if(!($isValid->checkFirstName($_POST['firstname'])) || !($isValid->checkLastName($_POST['lastname'])) 
    || !($isValid->checkAddress($_POST['address'])) || !($isValid->checkCity($_POST['city'])) || 
    !($isValid->checkLicenseNumber($_POST['licenseNumber'])) || !($isValid->checkIssue($_POST['issue'])) 
    || !($isValid->checkCardNumber($_POST['cardNumber'])) || !($isValid->checkBillingAddress($_POST['billingAddress'])) ||
    !($isValid->checkPreferredVehicleType($_POST['preferredVehicle'])) || !($isValid->checkRentalDuration($_POST['duration']))
    || !($isValid->checkPickUpLocation($_POST['pickUp']))|| !($isValid->checkDropLocation($_POST['dropOff']))){

        //Gets the errors produced during validation
        $errorMessages = $isValid->getErrors();
        print_r($isValid->getErrors());
        unset($isValid);
        
        //Unsets data input to database error 
        if(isset($_SESSION['customersErrors'])){
            unset($_SESSION['customersErrors']);
        }
        else{
            echo ("No data input error");
        }

        $_SESSION['validationError'] = $errorMessages;
        //Passes the errors to be displayed back to the customer page as an encoded query string
        header('Location:../template/customers.php');
    }else{
        
        if(isset($_SESSION['validationError'])){
            unset($_SESSION['validationError']);
        }
        require 'handler.php';
    }

}else if($_POST['validatorMethod'] == 'customerEdit'){

    //Passes the customers id to session super global to be used to retrieve data from the database.
    $_SESSION['customerId'] = $_POST['customerId'];
    echo($_SESSION['customerId']);

    //Removes previous stored form validation errors
    if(isset($_SESSION['validationError'])){
        unset($_SESSION['validationError']);
    }

    //Runs validation on the form inputs
    if(!($isValid->checkMake($_POST['make'])) || !($isValid->checkModel($_POST['model'])) 
    || !($isValid->checkYear($_POST['year'])) || !($isValid->checkVin($_POST['vin'])) || 
    !($isValid->checkInteriorColor($_POST['interiorColor'])) || !($isValid->checkExteriorColor($_POST['exteriorColor'])) 
    || !($isValid->checkLicensePlate($_POST['licensePlate'])) || !($isValid->checkOdometer($_POST['odometer']))){

        //Gets the errors produced during validation
        $errorMessages = $isValid->getErrors();
        print_r($isValid->getErrors());
        unset($isValid);
        
        //Unsets data input to database error 
        if(isset($_SESSION['customersErrors'])){
            unset($_SESSION['customersErrors']);
        }
        else{
            echo ("No data input error");
        }

        $_SESSION['validationError'] = $errorMessages;

        //Passes the errors to be displayed back to the customers page as an encoded query string
        header('Location:../template/customersEdit.php');
    }else{
        
        //Removes previous stored form validation errors
        if(isset($_SESSION['validationError'])){
            unset($_SESSION['validationError']);
        }
        
        //Passes off processing to data handler
        require 'handler.php';
    }
}else if($_POST['validatorMethod'] == 'rental'){

    //Runs validation on the form inputs
    if(!($isValid->checkCustomerId($_POST['customerId'])) || !($isValid->checkVehicleId($_POST['vehicleId'])) 
    || !($isValid->checkEmployeeId($_POST['employeeId'])) || !($isValid->checkOutstandingBalances($_POST['outstandingBalances'])) || 
    !($isValid->checkAdditionalCharges($_POST['additionalCharges'])) || !($isValid->checkRentalRate($_POST['rentalRate'])) ||
    !($isValid->checkExistingDamages($_POST['existingDamages'])) || !($isValid->checkAdditionalCharges($_POST['additionalCharges'])) 
    || !($isValid->checkNewDamages($_POST['newDamages']))){

        //Gets the errors produced during validation
        $errorMessages = $isValid->getErrors();
        print_r($isValid->getErrors());

        unset($isValid);
        
        //Unsets data input to database error 
        if(isset($_SESSION['rentalsErrors'])){
            unset($_SESSION['rentalsErrors']);
        }
        else{
            echo ("No data input error");
        }

        $_SESSION['validationError'] = $errorMessages;
        //Passes the errors to be displayed back to the customer page as an encoded query string
        header('Location:../template/rental-returns-form.php');
    }else{
        
        if(isset($_SESSION['validationError'])){
            unset($_SESSION['validationError']);
        }
        require 'handler.php';
    }
   
    // echo('hello');
    // header("Location:handler.php") ;

}else if($_POST['validatorMethod'] == 'rentalEdit'){

    //Passes the rental id to session super global to be used to retrieve data from the database.
    $_SESSION['rentalId'] = $_POST['rentalId'];
    echo($_SESSION['rentalId']);

    //Passes off processing to data handler
    require 'handler.php';

}
