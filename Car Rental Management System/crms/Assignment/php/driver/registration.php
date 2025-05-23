<!--Remember to make liscence number input readonly-->
<?php
    require 'register_driver.php';
    require 'errorHandler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../../Css/driver/registration.css">
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
                <!--<h1>Vehicle Licensing and Rsgistration System </h1>-->
            </div>
            <div class="form-info">
                <h2>Account Registration</h2>
                <h3 id = "message">All Fields Denoted with an (*) are Required</h3>
                <h3 class = "errors"><?php echo(processErrors());?></h3>
                    <form action = "../../php/driver/validation.php" method="get">

                        <label for="national-id" class="id-label"><!--National ID--> <input class="national-id" type="text" name="nationalId" placeholder = "*National ID (yyyy-mm-dd-xxxx)" size = "25" required></label>
                        <label for="License-Number" class="license-label" ><!--License No.--> <input class="License-Number" type="text" name="licenseNo" placeholder = "*License No.: (Auto-Genarated)" size = "25" readonly></label>
                        <label for="first-name" class= "firstname-label"><!--First Name--><input class="first-name" type="text" name="firstName" placeholder = "*First Name" size = "25"required></label>
                        <label for="last-name" class= "lastname-label"><!--Last Name--><input class="last-name" type="text" name="lastName" placeholder = "*Last Name" size = "25"required></label>
                        <label for="email" class= "email-label"><!--Email--><input class="email" type="email" name="email" placeholder = "*Email" size = "25" required></label>
                        <label for="telephone" class= "telephone-label"><!--Telephone--><input class="prefix" type="text" name= "prefix" placeholder = "Prefix" size = "5"><p>-</p><input class="lineNumber" type="text" name="lineNumber" placeholder = "Telephone" size = "14"></label>
                        <label for="address-1" class= "address"><!--Address 1--><input class="address-style" type="text" name="address1" placeholder = "Address 1" size = "25"></label>
                        <label for="address-2" class= "address"><!--Address 2--><input class="address-style" type="text" name="address2" placeholder = "Address 2" size = "25"></label>
                        <input id = "jscheck" type = "hidden" name = "js_validated" value = "false"> 
                        <input id = "validation" type = "hidden" name = "validation_type" value = "registration"> 
                        <select class = "parishes" name = "parishes"><?php echo(loadParishes());?></select>
                        <div class="button-sections">
                            <button class ="register-btn" type= "submit">Register</button>
                            <a href="../../php/driver/index.php"><button type = "button" class ="cancel-btn">Cancel </button></a>
                        </div>                            
                    </form>       
            </div>
        </div>
    </div>
    <script src= "../../javascript/driver/registration.js"></script>
</body>
</html>