<?php
    require 'confirmation_driver.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="../../Css/driver/confirmation.css">
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
                    <img id="menu" src="../../Images/hamburger_menu.png" alt="hamburger menu icon">
                    <div id ="dropdown-box" class="drop-down-box">
                    <a href= "logout.php"><p id = "dropdown-item">Log Out</p></a>
                    </div>
                </div>
            </div>
            <div class="form-info">
                <label for="License-Number" class="license-label"><!--License No.--><textarea name="License-Number" id="License-Number" cols="40" rows="7" readonly><?php echo(getInfo());?></textarea></label>
            </div>
            <div class="form-link">
                <a href="../../php/driver/index.php">Sign In</a>
            </div>
        </div>
    </div>
    <script src="../../javascript/driver/confirmation.js"></script>
    <script src="../../javascript/driver/dropdown.js"></script>
</body>
</html>