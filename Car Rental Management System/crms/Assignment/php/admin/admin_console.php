<?php
    require 'AuthenticateClass.php';

    $isLoggedOn = new Authenticate();

    if($isLoggedOn->isUserLoggedIn()){
    }else{
        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
    <link rel="stylesheet" href="../../Css/admin/admin_console.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

</head>
<body>
    <div class="main-container">
        <div class="inner-container">
          
            <div class="form-header">
                <div class="logo">
                    <img src="../../Images/car.png" alt="Licensing Authority Logo">
                </div>
                
                <h1>Barbados Revenue Authority Vehicle Licensing and Registration System</h1>
                <div class="menu">
                    <img  id="menu" src="../../Images/hamburger_menu.png" alt="hamburger menu icon">
                    <div id ="dropdown-box" class="drop-down-box">
                    <a href = "logout.php"><p id = "dropdown-item">Log Out</p></a>
                    </div>
                </div>
            </div>
             <div id="employee-info">
                <h3>Employee: <?php echo "{$isLoggedOn->getUserInfo('fname')} {$isLoggedOn->getUserInfo('lname')}"?></h3>
                <h3>Employee Id: <?php $char_array = [];for($i = (strlen($isLoggedOn->getUserInfo('lno')) - 4); $i < strlen($isLoggedOn->getUserInfo('lno')); $i++){array_push($char_array,$isLoggedOn->getUserInfo('lno')[$i]);$licenseNO = implode('',$char_array);} echo $licenseNO;?></h3>
            </div>
            <div class="form-info-1">
                <button class="new-drivers"><a href="#">New Drivers</a></button>
                <button class="registered-drivers"><a href="#">Registered<br>Drivers</a></button>
            </div>
            <div class="form-info-2">
                <button class="new-vehicles"><a href="#">New Vehicles</a></button>
                <button class="registered-vehicles"><a href="registered_vehicles.php">Registered<br>Vehicles</a></button>
            </div>
        </div>
    </div>
    <script src="../../javascript/driver/dropdown.js"></script>
</body>
</html>