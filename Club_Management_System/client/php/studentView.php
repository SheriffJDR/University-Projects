<?php
    require_once('../../server/handlerClass.php');
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION["studentUser"])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Club</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='../css/studentView.css'>
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
                    <?php echo ('<h2>' . $_SESSION['studentUser']['fname'] . ' ' . $_SESSION['studentUser']['lname'] . '</h2>') ?>
                </div>
            </div>
            <div class="menu-container">
                <ul class="menu">
                    <a href = 'studentDash.php'><li class="menu-item active">Clubs</li></a>
                    <a href= 'studentApplication.php'><li class="menu-item">Applications</li></a>
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
                <h1>View Club</h1>
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
                <?php

                    $handler = new Handler();
                    $result = $handler->view();
                    if(isset($result['error'])){
                        return;
                    }else{
                        $result1 = $result['result'];
                        echo("
                        <form action='../../server/validate.php' method = 'POST'>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='club_name'>Club Name</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'club_name' value = ".$result1['club_name']." readonly>
                        </div>
                    </div>
                    <div class='input description'>
                        <div class='form-label'>
                            <label for='club_description'>Club Description</label>
                        </div>
                        <div class='form-input'>
                            <textarea type='text' name = 'club_description' value = readonly>". $result1['club_description']."</textarea>
                        </div>
                    </div>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='advisor_id'>Advisor Id</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'advisor_id'value = ". $result1['advisor_id']." readonly>
                        </div>
                    </div>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='membership_size'>Membership Size</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'membership_size' value = ". $result1['membership_size']. " readonly>
                        </div>
                    </div>
                    <div class='input'>
                        <div class='form-label'>
                            <label for='club_status'>Club Status</label>
                        </div>
                        <div class='form-input'>
                            <input type='text' name = 'club_status' value = ". $result1['club_status']. " readonly>
                        </div>
                    </div>

                </form>
                        
                        ");
                    }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>