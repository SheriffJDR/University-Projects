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
    <title>DarkPan - Bootstrap 5 Admin Template</title>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <a href="dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>      
                    <a href="vehicles.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Vehicles</a>
                    <a href="customers.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Customers</a>
                    <a href="rental-returns.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Rentals/Returns</a>
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

            <!--General vehicle info start-->
            <div class="container-fluid pt-4 px-4">
                            <div class="row g-4">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                                        <div class="ms-3">
                                            <p class="mb-2">Vehicles rented today</p>
                                            <h6 class="mb-0"><?php

                                            $handler = new handler();
                                            $handler->getVehicleToBeReturnedToday();

                                            if(isset($handler->getErrors['data'])){

                                                echo($handler->getErrors['data'] . " Vehicles");
                                            }else{
                                                echo($handler->getData()['data'] . " Vehicles");
                                            }


                                            ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                                        <div class="ms-3">
                                            <p class="mb-2">Vehicles in use</p>
                                            <h6 class="mb-0"><?php

                                                $handler = new handler();
                                                $handler->getVehiclesOnRental();

                                                if(isset($handler->getErrors['data'])){

                                                    echo($handler->getErrors['data'] . " Vehicles");
                                                }else{
                                                    echo($handler->getData()['data'] . " Vehicles");
                                                }
                                                

                                            ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Availible vehicles</p>
                                    <h6 class="mb-0"><?php

                                    $handler = new handler();
                                    $handler->getAvailableVehicles();

                                    if(isset($handler->getErrors['data'])){

                                        echo($handler->getErrors['data'] . " Vehicles");
                                    }else{
                                        echo($handler->getData()['data'] . " Vehicles");
                                    }


                                    ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- General vehicle info end -->

            <!--Vehicles rented out over the last week chart start-->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6" style = "display: none;">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Car Rental History</h6>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6" style = "display: none;">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Multiple Line Chart</h6>
                            <canvas id="salse-revenue" ></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Car Rental History</h6>
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6" style = "display: none;">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Multiple Bar Chart</h6>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Most Popular Model by use</h6>
                            <canvas id="doughnut-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6" style = "display: none;">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Pie Chart</h6>
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>
                    
                </div>
            </div> -->
            <!--Vehicles rented out over the last week chart end-->
            
            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Sales by day</h6>
                                <a href="">Show All</a>
                            </div>
                                <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Total Sales & Revenue by month</h6>
                                <a href="">Show All</a>
                            </div>
                          
                                <canvas id="line-chart"></canvas>                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->

        <!--Recent rentals table start-->
        <div class="container-fluid pt-4 px-4 ">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Rentals</h6>
                        <a class="btn btn-sm btn-primary mt-4" href= 'rental-returns-form.php' id="addVehicle">Add rental record</a>
                    </div>
                    <?php

                        $handler = new handler();
                        if(isset($_SESSION['session_user'])){
                            
                            $handler->getRecentRentals($_SESSION['session_user']['employee_id']);
                            $data = $handler->getData();
                            $error = $handler->getErrors();

                            if(isset($error['data_retrieval'])){
                                echo("
                                <div class='row vh-50 bg-secondary rounded align-items-center justify-content-center mx-0'>
                                <div class='col-md-6 text-center p-4'>
                                    <i class='bi bi-exclamation-triangle display-1 text-primary'></i>
                                    <h1 class='display-1 fw-bold'>404</h1>
                                    <h1 class='mb-4'>{$error['data_retrieval']}</h1>
                                    <p class='mb-4'>{$error['error_message']}</p>
                                </div>
                            </div>
                                ");
                            }else{
                                echo("
                                <div class='table-responsive overflow-auto'>
                                        <table class='table text-start align-middle table-bordered table-hover mb-0'>   
                                            
                                            <thead class ='text-nowrap'>
                                                <tr class='text-white'>
                                                    <th scope='col'><input class='form-check-input' type='checkbox'></th>
                                                    <th scope='col'>Rental ID</th>
                                                    <th scope='col'>Customer ID</th>
                                                    <th scope='col'>Vehicle ID</th>
                                                    <th scope='col'>Rental Start Date</th>
                                                    <th scope='col'>Rental End Date</th>
                                                    <th scope='col'>Rental Rate</th>
                                                    <th scope='col'>Outstanding balances</th>
                                                    <th scope='col'>Date rented</th>
                                                    <th scope='col'>Action</th>
                                                    
                                                </tr>
                                            </thead>");
                            foreach($data as $value){
                                echo("
                                
                                        <tbody>
                                            <tr>
                                                <td><input class='form-check-input' type='checkbox'></td>
                                                <td>{$value['rental_id']}</td>
                                                <td>{$value['customer_id']}</td>
                                                <td>{$value['vehicle_id']}</td>
                                                <td>{$value['rental_start_date']}</td>
                                                <td>{$value['rental_end_date']}</td>
                                                <td>{$value['rental_rate']}</td>
                                                <td>{$value['outstanding_balances']}</td>
                                                <td>{$value['date_rented']}</td>
                                                <td class = 'd-flex flex-row'>
                                                    <form action = 'rental-returns-edit.php' method = 'post'>
                                                    <input type ='hidden' name = 'handlerMethod' value  = 'editRental'>
                                                    <button type= 'submit' class = 'btn btn-sm btn-primary' name='rentalId' value = '{$value['rental_id']}'>Edit</button>
                                                    </form>
                                                    <form action = '../functionality/handler.php' method = 'post'>
                                                    <input type ='hidden' name = 'handlerMethod' value  = 'deleteRental'>
                                                    <button type= 'submit' class = 'btn btn-sm btn-primary ms-2' name='rentalId' value = '{$value['rental_id']}'>Delete</button></td>
                                                    </form>
                                            </tr>
                                        </tbody>
                              
                                ");
                            }
                            echo("</table> </div>");
                            unset($value);
                        } 
                    }else{
                        //
                    }
                                              
                    ?>
                </div> 
            </div>
        <!--Recent rentals table end--> 

           
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