<?php

require 'RegisteredVehiclesClass.php';

if(isset($_POST)){
    
    $getRecords = new RegisteredVehicles();
    $getRecords->dbConnect("localhost","root",null);
    header("Location:registered_vehicle_details.php?" . http_build_query($getRecords->getRegisteredDrivers()));
}

