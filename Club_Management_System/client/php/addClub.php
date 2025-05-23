<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION["adminUser"])){
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Club</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='../css/addClub.css'>
</head>
<body>
<div class="content">
        <div class="taskbar">
            <div class="profile">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="121" height="121" viewBox="0 0 121 121" fill="none">
                        <circle cx="60.5" cy="60.5" r="60.5" fill="#7C3BE7" />
                    </svg>
                </div>
                <div class="user">
                    <?php echo ('<h2>' . $_SESSION['adminUser']['fname'] . ' ' . $_SESSION['adminUser']['lname'] . '</h2>') ?>
                </div>
            </div>
            <div class="menu-container">
                <ul class="menu">
                    <a href = 'adminDash.php'><li class="menu-item active">Clubs</li></a>
                    <a href= 'adminApplication.php'><li class="menu-item">Applications</li></a>
                    <form action="../../server/handler.php" method="POST">
                        <input type='hidden' name='handlerMethod' value='studentLogOut'>
                        <button type='submit' class="logOutBtn">Log Out</button>
                    </form>
                </ul>
            </div>
        </div>
        <div class="taskbar-container"> </div>
        <div class='form-container'>
        
            <div class="form-heading">
                <h1>Add New Club</h1>
            </div>
            <?php
                if(isset($_GET['error'])){
       
                    echo("
                    <div class='error'>
                    <h2>".$_GET['error']."</h2>
                </div>
                    ");
                }
                if(isset($_GET['query'])){
       
                    echo("
                    <div class='error'>
                    <h2>".$_GET['query']."</h2>
                </div>
                    ");
                }
            ?>
            <div class="horizontal">
                <hr class="hr-line">
            </div>
            
            <div class="form-wrapper">
                <form action='../../server/validate.php' method = 'POST'>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='club_name'>Club Name</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'club_name'>
                        </div>
                    </div>
                    <div class='input description'>
                        <div class='form-label'>
                            <label for='club_description'>Club Description</label>
                        </div>
                        <div class='form-input'>
                            <textarea type='text' name = 'club_description'></textarea>
                        </div>
                    </div>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='advisor_id'>Advisor Id</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'advisor_id'>
                        </div>
                    </div>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='payment'>Payment</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'payment'>
                        </div>
                    </div>
                    <div class='input description'>
                        <div class='form-label'>
                            <label for='payment_description'>Payment Description </label>
                        </div>
                        <div class='form-input'>
                            <textarea type='text' name = 'payment_description'></textarea>
                        </div>
                    </div>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='membership_size'>Membership Size</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'membership_size'>
                        </div>
                    </div>

                    <div class='input'>
                        <div class='form-label'>
                            <label for='year_group'>Year Group</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'year_group'>
                        </div>
                    </div>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='meeting_quantity'>Meeting Quantity</label>
                        </div>
                        <div class='form-select-input'>
                            <select type='text' id='meeting_quantity' name = 'meeting_quantity'>
                                <option>1</option>
                                <option>2</option>
                            </select>
                            <div class='error'>
                                <p class='quantity-error'></p>
                            </div>
                        </div>
                    </div>
                    <div id = 'meeting-info' class='input'>
                        <div class="set">
                            <div class='section'>
                                <div class='form-label'>
                                    <label for='meeting_day'>Meeting Day</label>
                                </div>
                                <div class='meeting-select-input'>
                                    <select type='text' id='meeting_day' name = 'meeting_day1'>
                                        <option>Monday</option>
                                        <option>Tuesday</option>
                                        <option>Wednesday</option>
                                        <option>Thursday</option>
                                        <option>Friday</option>
                                        <option>Saturday</option>
                                        <option>Sunday</option>
                                    </select>
                                </div>               
                            </div>
                            <div class='section'>
                                <div class='form-label'>
                                    <label for='meeting_time'>Meeting Time</label>
                                </div>
                                <div class='form-input'>
                                    <input type = 'time' id='meeting_time' name='meeting_time1'>
                                </div>               
                            </div>
                            <div class='section'>
                                <div class='form-label'>
                                    <label for='meeting_location'>Meeting Location</label>
                                </div>
                                <div class='form-input'>
                                    <input id='meeting_location' name='meeting_location1'>
                                </div>               
                            </div>
                        </div>
                    </div>
                    <input type='hidden' name='club_status' value='active'>
                    <input type='hidden' name='validationType' value='club'>
                    <button type='submit' id='addClub' class='addClub'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4z" />
                    </svg>
                    <h3>Add</h3>
                </button>
                </form>
            </div>
        </div>
    </div>
    <script src = '../js/addClub.js'></script>
</body>
</html>