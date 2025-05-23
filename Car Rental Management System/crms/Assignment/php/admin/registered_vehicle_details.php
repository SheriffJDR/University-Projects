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
    <title>Registered Vehicle Details</title>
    <link rel="stylesheet" href="../../Css/admin/registered_vehicle_details.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body> 
    <!-- Header call removes POST variable so find another method;   -->
    <div class="main-container">
        <div class="inner-container">
            <div class="form-header">
                <div class="logo">
                    <img src="../../Images/car.png" alt="Licensing Authority Logo">
                </div>
                <div class="header-heading">
                    <h1>Barbados Revenue Authority <br>Vehicle Licensing and Registration System</h1>
                </div>
                <div class="menu">
                    <img id="menu" src="../../Images/hamburger_menu.png" alt="hamburger menu icon">
                    <div id ="dropdown-box" class="drop-down-box">
                    <a href= "logout.php"><p id = "dropdown-item">Log Out</p></a>
                    </div>
                </div>
            </div>
            <div id="employee-info">
                <h3>Employee: <?php echo "{$isLoggedOn->getUserInfo('fname')} {$isLoggedOn->getUserInfo('lname')}"?></h3>
                <h3>Employee Id: <?php $char_array = [];for($i = (strlen($isLoggedOn->getUserInfo('lno')) - 4); $i < strlen($isLoggedOn->getUserInfo('lno')); $i++){array_push($char_array,$isLoggedOn->getUserInfo('lno')[$i]);$licenseNO = implode('',$char_array);} echo $licenseNO;?></h3>
            </div>
            <div class="search-section">
                <h2>Vehicle Record</h2>

                <form action="registered_vehicles.php" method = "post">
                    <input name = "search_query" class = "search_query_class" type = "text"  size= "35" placeholder = "Vehicle search Info">
                    <button type = "submit" clsas="search-btn">Search</button>
                </form>
            </div>
            <div class="record-section">
                <div class="headings">
                    <div class="record-heading-1">Action</div>   
                    <div class="record-heading-2">Registration No.</div>   
                    <div class="record-heading-3">Manu.</div>   
                    <div class="record-heading-4">Make</div>   
                    <div class="record-heading-5">Model</div>   
                    <div class="record-heading-6">Year</div>   
                    <div class="record-heading-7">Natil ID</div>   
                    <div class="record-heading-8">Driver</div>   
                </div>
                <hr class ="line">
                <div class="records">
                    <?php
                        if(!empty($_GET)){
                          
                            for($i = 0; $i < count($_GET); $i++) {
                                echo("

                                <div class='record-details'>
                                    <div class= 'field-1'>
                                        <a href='#'>Edit</a>
                                        <a href='#'>Delete</a>
                                    </div> 
                                    <div class='field-2'>{$_GET[$i]['registration_no']}</div>
                                    <div class='field-3'>{$_GET[$i]['manu']}</div>
                                    <div class='field-4'>{$_GET[$i]['make']}</div>
                                    <div class='field-5'>{$_GET[$i]['Model']}</div>
                                    <div class='field-6'>{$_GET[$i]['Year']}</div>
                                    <div class='field-7'>{$_GET[$i]['national_id']}</div>
                                    <div class='field-8'>{$_GET[$i]['Driver']}</div>   
                                    </div><hr>");
                            
                            }
                             
                        }else{
                            echo("<h2 class = 'no-records'>No records to show at this time.</h2>");
                        }
        
                    ?>
                </div>
            </div>
         </div>
    </div>

    <script src="../../javascript/driver/dropdown.js"></script>
</body>
</html>