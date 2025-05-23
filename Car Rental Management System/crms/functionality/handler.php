<?php
require "datahandlerClass.php";

if(empty($_POST)){
  header("Location:../template/dashboard.php");
}
else if($_POST['handlerMethod'] === "addCustomer"){
    $handler = new handler();
    $handler->addCustomer();

   if(null !== $handler->getErrors()){
        $_SESSION['customersErrors'] = $handler->getErrors();
        header("Location:../template/customers.php");
    }else{
        unset($_SESSION['customersErrors']);
        header("Location:../template/customers.php");
    }
}
else if($_POST['handlerMethod'] === "editCustomer"){
    $handler = new handler();
    $handler->editCustomerRecord($_POST);
    header("Location:../template/customers.php");

}else if($_POST['handlerMethod'] === "deleteCustomer"){
    $handler = new handler();
    $handler->deleteCustomerRecord($_POST);
    header("Location:../template/customers.php");

}else if($_POST['handlerMethod'] === "addVehicle"){
    $handler = new handler();
    $handler->addVehicle($_POST);

    if(null !== $handler->getErrors()){
        $_SESSION['errors'] = $handler->getErrors();
        header("Location:../template/vehicles.php");
    }else{
        unset($_SESSION['errors']);
        header("Location:../template/vehicles.php");
    }
   
}else if($_POST['handlerMethod'] === "editVehicle"){
    
    $handler = new handler();
    $handler->editVehicleRecord($_POST);

    if(null !== $handler->getErrors()){
        //Gets data handler errors
        $_SESSION['errors'] = $handler->getErrors();

        //Transfers to be used in record retrieval
        $_SESSION['vehicleId'] = $_POST['vehicleId'];   
        header("Location:../template/vehiclesEdit.php");
    }else{
        unset($_SESSION['errors']);
        unset($_SESSION['vehicleId']);
        header("Location:../template/vehicles.php");
    }

}else if($_POST['handlerMethod'] === "deleteVehicle"){
    $handler = new handler();
    $handler->deleteVehicleRecord($_POST);
    header("Location:../template/vehicles.php");

}else if($_POST['handlerMethod'] === "deleteRental"){

    $handler = new handler();
    $handler->deleteRentalRecord($_POST);
    header("Location:../template/customers.php");

}else if($_POST['handlerMethod'] === "addRental"){
    
    $handler = new handler();
    $handler->addRental($_POST);

    if(null !== $handler->getErrors()){
        $_SESSION['rentalErrors'] = $handler->getErrors();
        header("Location:../template/rental-returns.php");
    }else{
        unset($_SESSION['rentalErrors']);
        header("Location:../template/rental-renturns.php");
    }
}else if($_POST['handlerMethod'] === "editRental"){
    
    $handler = new handler();
    $handler->editRentalRecord($_POST);

    if(null !== $handler->getErrors()){

        //Gets data handler errors
        $_SESSION['rentalErrors'] = $handler->getErrors();

        //Transfers to be used in record retrieval
        $_SESSION['recordId'] = $_POST['recordId'];   
        header("Location:../template/rental-returns.php");
    }else{
        unset($_SESSION['rentalErrors']);
        header("Location:../template/rental-renturns.php");
    }
}
