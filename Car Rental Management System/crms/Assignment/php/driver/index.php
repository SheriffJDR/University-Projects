<?php
    require 'errorHandler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../../Css/driver/index.css">
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
            </div>
            <div class="form-info">
                <h2>Driver Sign in</h2>
                <h3 id = "message"></h3>
                <h3 class = "errors"><?php echo(processErrors());?></h3>
                    <form action="../../php/driver/validation.php" method = "post">
                        <label for="License-Number" class="input-label"><!--License No.--> <input class="License-Number" type="text" name = "licenseNo"  placeholder = "License Number" size = "25" required></label>
                        <label for="password" class= "input-label"><!--Password--><input class="password" type="password" name = "password" placeholder = "Password" size = "25"required></label>
                        <input id = "jscheck" type = "hidden" name = "js_validated" value = "false">
                        <input id = "validation" type = "hidden" name = "validation_type" value = "true">
                        <button class ="sign-in-btn" type= "submit">Sign in</button>
                    </form>
        
            </div>
            <div class="form-link">
                <a href="#">Forgot password</a>
                <a href="../../php/driver/registration.php">Sign Up</a>
            </div>
        </div>
    </div>
    <script src="../../javascript/driver/index.js"></script>
</body>
</html>