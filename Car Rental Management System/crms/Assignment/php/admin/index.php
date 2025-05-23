<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Login</title>
    <link rel="stylesheet" href="../../Css/admin/index.css">
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
            <div class="errors"></div>
            <div class="form-info">
                <h3>Administration Login</h3>
                <h4 id="message"><?php
                 
                    if(isset($_GET)){
                        foreach($_GET as $category => $error)
                        {
                            echo($category.': '.$error);
                        }
                        
                    }
                    else{return;}?></h4>

                    <form action = "adminvalidate.php" method = "POST">
                        <label for="employee-ID" class="employee-ID-label"><!--License No.--> <input class ="employee-ID" name="employee_id" type="text" placeholder = "Employee ID" size = "25" required></label>
                        <label for="password" class= "password-label"><!--Password--><input class ="password" name = "password" type="password" placeholder = "Password" size = "25"required></label>
                        <input id = "validation" type = "hidden" name = "validation_type" value = "false">
                        <button type = "submit" class ="log-in-btn"> Log In</button>
                    </form>
                    
            </div>
            <div class="form-link">
                <a href="#">Recover password</a>
            </div>
        </div>
    </div>    

        <!-- <script src="../../javascript/driver/index.js"></script> -->
        <!-- <script src="../../javascript/admin/index.js"></script> -->
</body>
</html>