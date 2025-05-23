<?php
    require 'loginstatus.php';
    require 'public_console_driver.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Console</title>
    <link rel="stylesheet" href="../../Css/driver/public_console.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

</head>
<body>
    <div class = "main-container">
        <div class="inner-container">
          
            <div class="form-header">
                <div class="logo">
                    <img src="../../Images/car.png" alt="Licensing Authority Logo">
                </div>
               
                <h1>Barbados Revenue Authority Vehicle Licensing and Registration System</h1>
                <div class="menu">
                    <img id="menu" src="../../Images/hamburger_menu.png" alt="hamburger menu icon">
                    <div id ="dropdown-box" class="drop-down-box">
                        <a href= "logout.php"><p id = "dropdown-item">Log Out</p></a>
                    </div>
                     
                </div>
            </div>
            <div id = "driver-info"><?php checkLogin();?></div>
            <div class="form-info">
                <button class="renew-license"><a href="#">Renew Licence</a></button>
                <button class="renew-vehicle"><a href="#">Renew Vehicle Registration</a></button>
            </div>
        </div>
    </div>
    <script src="../../javascript/driver/public_console.js"></script>
    <script src="../../javascript/driver/dropdown.js"></script>
</body>
</html>