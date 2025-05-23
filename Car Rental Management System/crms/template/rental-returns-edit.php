<?php
    include "../functionality/authenticateClass.php";
    include "../functionality/datahandlerClass.php";
    $logInCheck = new authenticateClass();
    
    if(!$logInCheck->isUserLoggedIn()){
        header("Location:../template/index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CRMS Rentals and Returns</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>CRMS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php
                        $obj = new authenticateClass();
                        echo $obj->getUserInfo("fname") . " " . $obj->getUserInfo("lname");?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>      
                    <a href="vehicles.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Vehicles</a>
                    <a href="customers.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Customers</a>
                    <a href="rental-returns.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Rentals/Returns</a>
                    <a href="reports.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Reports</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php
                        $obj = new authenticateClass();
                        echo $obj->getUserInfo("fname") . " " . $obj->getUserInfo("lname");?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="../functionality/logOut.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!--Rentals Table Start -->
        <!--Form start-->
        <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Edit Rental Information in Database</h6>
                            <p class ="text-primary text-center"><?php
                              
                            if(isset($_SESSION['validationError'])){
                                echo("
                                    <div class='text-center align-items-center justify-content-center p-4'>
                                        <i class='bi bi-exclamation-triangle display-1 text-primary'></i>
                                ");
                                echo("<p class = 'text-primary'>");
                                foreach($_SESSION['validationError'] as $error)
                                {
                                    echo($error . "\n");
                                }
                                echo("<p></div>");
                            }
                            else{
                                unset($_SESSION['validationError']);
                            }?>
                            <?php
                        print_r($_POST);
                        //Checks if the page is called from the add vehicle page or if it is reloaded due to data edit error.          
                            if(isset($_SESSION['recordId'])){
                                
                                $handler = new handler();
                                $handler->getRentalRecord($_SESSION['recordId']);
                                
                                echo("
                                <h6 class='mb-4'>Rental Information</h6>
                                <form action = '../functionality/validate.php' method = 'post'>
                                    <input type='hidden' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' name = 'vehicleId' value = '{$_SESSION['recordId']}'>
                                    <div class='mb-3'>
                                        <label for='customerId' class='form-label'>Customer Id</label>
                                        <input type='text' class='form-control' id='makeInput'
                                            aria-describedby='emailHelp' name = 'customerId' value = '{$handler->getDate()[0]['customer_id']}' readonly required>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='vehicleId' class='form-label'>Vehicle Id</label>
                                        <input type='text' class='form-control' id='modelInput'
                                            aria-describedby='emailHelp' name = 'vehicleId' value = '{$handler->getDate()[0]['vehicle_id']}' readonly required>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='employeeId' class='form-label'>Employee Id</label>
                                        <input type='text' class='form-control' aria-describedby='emailHelp' name = 'employeeId' value = '{$handler->getDate()[0]['employee_id']}' readonly required>

                                    </div>
                                    <div class='mb-3'>
                                    <label for='vehicleStatus' class='form-label'>Vehicle Status</label>
                                        <select name='vehicleStatus' class ='form-select' style = 'background-color:black;' id='vehicleStatusInput'>
                                        <option value='rented' >Rented</option>
                                        <option value='available'>Available</option>
                                        </select>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='rentalStart' class='form-label'>Start of Rental Period</label>
                                        <input type='date' class='form-control' aria-describedby='emailHelp' name = 'rentalStart' value = '{$handler->getDate()[0]['rental_start_date']}' required>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='rentalEnd' class='form-label'>End of rental period</label>
                                        <input type='date' class='form-control' aria-describedby='emailHelp' name = 'rentalEnd' value = '{$handler->getDate()[0]['rental_end_date']}' required>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='outstandingBalances' class='form-label'> Outstanding Balances</label>
                                        <input type='text' class='form-control' aria-describedby='emailHelp' name = 'outstandingBalances' value = '{$handler->getDate()[0]['outstanding_balances']}' required>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='rentalRate' class='form-label'>Rental Rate</label>
                                        <input type='text' class='form-control' aria-describedby='emailHelp' name = 'rentalRate' value = '{$handler->getDate()[0]['rental_rate']}' required>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='additionalCharges' class='form-label'>Additional Charges</label>
                                        <input type='text' class='form-control' aria-describedby='emailHelp' name = 'additionalCharges' value = '{$handler->getDate()[0]['additional_charges']}'  required>
                                    </div>
                                    <div class='form-floating mt-2'>
                                        <label for='existingDamages'>Existing Damages</label>
                                        <textarea class='form-control'  name = 'existingDamages' style='height: 150px;' value = '{$handler->getDate()[0]['existing_damages']}'></textarea>
                                    </div>
                                    <div class='form-floating mt-3'>
                                        <label for='newDamages'>New Damages</label>
                                        <textarea class='form-control' name = 'newDamages' style='height: 150px;' value = '{$handler->getDate()[0]['new_damages']}'></textarea>
                                    </div>

                                    <input name='handlerMethod' type = 'hidden' value = 'addRental'>
                                    <input type='hidden' name = 'validatorMethod' value = 'rental'>
                                    <button  class=' text-center btn btn-primary mt-3'  id = 'submitRental'>Add</button>
                                    </form>
                                ");
                            
                        }else{
                            print_r($_POST);
                            $handler = new handler();
                            $handler->getRentalRecord($_POST['recordId']);
                            
                            echo("
                                    <h6 class='mb-4'>Rental Information</h6>
                                    <form action = '../functionality/validate.php' method = 'post'>
                                        <input type='hidden' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' name = 'vehicleId' value = '{$_POST['recordId']}'>
                                        <div class='mb-3'>
                                            <label for='customerId' class='form-label'>Customer Id</label>
                                            <input type='text' class='form-control' id='makeInput'
                                                aria-describedby='emailHelp' name = 'customerId' value = '{$handler->getDate()[0]['customer_id']}' readonly required>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='vehicleId' class='form-label'>Vehicle Id</label>
                                            <input type='text' class='form-control' id='modelInput'
                                                aria-describedby='emailHelp' name = 'vehicleId' value = '{$handler->getDate()[0]['vehicle_id']}' readonly required>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='employeeId' class='form-label'>Employee Id</label>
                                            <input type='text' class='form-control' aria-describedby='emailHelp' name = 'employeeId' value = '{$handler->getDate()[0]['employee_id']}' readonly required>

                                        </div>
                                        <div class='mb-3'>
                                         <label for='vehicleStatus' class='form-label'>Vehicle Status</label>
                                             <select name='vehicleStatus' class ='form-select' style = 'background-color:black;' id='vehicleStatusInput'>
                                                 <option value='rented' >Rented</option>
                                                 <option value='available'>Available</option>
                                             </select>
                                         </div>
                                        <div class='mb-3'>
                                            <label for='rentalStart' class='form-label'>Start of Rental Period</label>
                                            <input type='date' class='form-control' aria-describedby='emailHelp' name = 'rentalStart' value = '{$handler->getDate()[0]['rental_start_date']}' required>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='rentalEnd' class='form-label'>End of rental period</label>
                                            <input type='date' class='form-control' aria-describedby='emailHelp' name = 'rentalEnd' value = '{$handler->getDate()[0]['rental_end_date']}' required>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='outstandingBalances' class='form-label'> Outstanding Balances</label>
                                            <input type='text' class='form-control' aria-describedby='emailHelp' name = 'outstandingBalances' value = '{$handler->getDate()[0]['outstanding_balances']}' required>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='rentalRate' class='form-label'>Rental Rate</label>
                                            <input type='text' class='form-control' aria-describedby='emailHelp' name = 'rentalRate' value = '{$handler->getDate()[0]['rental_rate']}' required>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='additionalCharges' class='form-label'>Additional Charges</label>
                                            <input type='text' class='form-control' aria-describedby='emailHelp' name = 'additionalCharges' value = '{$handler->getDate()[0]['additional_charges']}'  required>
                                        </div>
                                        <div class='form-floating mt-2'>
                                            <label for='existingDamages'>Existing Damages</label>
                                            <textarea class='form-control'  name = 'existingDamages' style='height: 150px;' value = '{$handler->getDate()[0]['existing_damages']}'></textarea>
                                        </div>
                                        <div class='form-floating mt-3'>
                                            <label for='newDamages'>New Damages</label>
                                            <textarea class='form-control' name = 'newDamages' style='height: 150px;' value = '{$handler->getDate()[0]['new_damages']}'></textarea>
                                        </div>

                                        <input name='handlerMethod' type = 'hidden' value = 'addRental'>
                                        <input type='hidden' name = 'validatorMethod' value = 'rental'>
                                        <button  class=' text-center btn btn-primary mt-3'  id = 'submitRental'>Add</button>
                                        </form>
                                "
                                );       
                            }        

                                        
                        ?>
                           

                        </div>
                    </div>
                </div>
            </div>
        <!--Form end-->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>