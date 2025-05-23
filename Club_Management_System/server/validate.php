<?php
require_once("validatorClass.php");
//Handles validation of data being passed to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    print_r($_POST);
    if (isset($_POST['validationType'])) {

        $validate = new Validate();

        if ($_POST['validationType'] == 'student') {

            if ($validate->checkId($_POST['studentId']) && $validate->checkPassword($_POST['password'])) {
                $_POST['handlerMethod'] = 'studentLogIn';
                require 'handler.php';
                exit;
            }
            header('Location: ../client/php/index.php?' . http_build_query($validate->getErrors()));

        }
        if ($_POST['validationType'] == 'admin') {

            if ($validate->checkId($_POST['adminId']) && $validate->checkPassword($_POST['password'])) {
                $_POST['handlerMethod'] = 'adminLogIn';
                require 'handler.php';
                exit;
            }

            header('Location: ../client/php/admin.php?' . http_build_query($validate->getErrors()));

        }
        if ($_POST['validationType'] == 'club') {

            if(!isset($_POST['meeting_quantity'])){
                $error = array();
                $error['error'] = 'Meeting quantity undefined.';
                header('Location: ../client/php/addClub.php?' . http_build_query($error));
            }else{
                //Validates add club form with one meeting.
                if($_POST['meeting_quantity'] == 1){
                    if (
                        $validate->checkClubName($_POST['club_name']) && $validate->checkClubDescription($_POST['club_description']) && $validate->checkAdvisorId($_POST['advisor_id']) && $validate->checkPayment($_POST['payment']) && $validate->checkPaymentDescription($_POST['payment_description'])
                        && $validate->checkMembershipSize($_POST['membership_size']) && $validate->checkYearGroup($_POST['year_group']) && $validate->checkMeetingLocation($_POST['meeting_location1']) && $validate->checkMeetingTime($_POST['meeting_time1'])
                    ) {
                        $_POST['handlerMethod'] = 'addClubWithOneMeeting';
                        require 'handler.php';
                    } else {
                        header('Location: ../client/php/addClub.php?' . http_build_query($validate->getErrors()));
                    }
                }else{
                     //Validates add club form with two meetings.
                     if (
                        $validate->checkClubName($_POST['club_name']) && $validate->checkClubDescription($_POST['club_description']) && $validate->checkAdvisorId($_POST['advisor_id']) && $validate->checkPayment($_POST['payment']) && $validate->checkPaymentDescription($_POST['payment_description'])
                        && $validate->checkMembershipSize($_POST['membership_size']) && $validate->checkYearGroup($_POST['year_group']) && $validate->checkMeetingLocation($_POST['meeting_location1']) && $validate->checkMeetingTime($_POST['meeting_time1'])
                        && $validate->checkMeetingLocation($_POST['meeting_location2']) && $validate->checkMeetingTime($_POST['meeting_time2'])
                    ) {
                        $_POST['handlerMethod'] = 'addClubWithTwoMeetings';
                        require 'handler.php';
                    } else {
                        header('Location: ../client/php/addClub.php?' . http_build_query($validate->getErrors()));
                    }
                }
            }

        }
        if($_POST['validationType'] == 'adminSearch'){

            if(empty($_POST['club_id']) && empty($_POST['club_name'])){
                
                $error = array();
                $error['error'] = 'Please enter a value for at least one criteria before searching.';
                header('Location: ../client/php/adminSearch.php?' .  http_build_query($error));
                exit();
            }
            if(!empty($_POST['club_name']) && empty($_POST['club_id'])){

                if($validate->checkClubName($_POST['club_name'])){
                    
                    $_POST['handlerMethod'] = 'adminSearch';
                    $_POST['searchMethod'] = 'name';
                    require 'handler.php';
                  
                }else{
                    header('Location: ../client/php/adminSearch.php?'. http_build_query($validate->getErrors()));
                    exit();
                }
            }
            if(empty($_POST['club_name']) && !empty($_POST['club_id'])){

                if($validate->checkClubId($_POST['club_id'])){

                    $_POST['handlerMethod'] = 'adminSearch';
                    $_POST['searchMethod'] = 'id';
                    require 'handler.php';
                   
                }else{
                    header('Location: ../client/php/adminSearch.php?'. http_build_query($validate->getErrors()));
                    exit();
                }
            }
            if($validate->checkClubId($_POST['club_id']) && $validate->checkClubName($_POST['club_name'])){

                $_POST['handlerMethod'] = 'adminSearch';
                $_POST['searchMethod'] = 'both';
                require 'handler.php';


            }else{
                header('Location: ../client/php/adminSearch.php?'. http_build_query($validate->getErrors()));
                exit();
            }
        }
        if($_POST['validationType'] == 'studentSearch'){

            if(empty($_POST['club_id']) && empty($_POST['club_name'])){

                $error = array();
                $error['error'] = 'Please enter a value for at least one criteria before searching.';
                header('Location: ../client/php/studentSearch.php?'. http_build_query($error));
                exit();
            }
            if(!empty($_POST['club_name']) && empty($_POST['club_id'])){

                if($validate->checkClubName($_POST['club_name'])){

                    $_POST['handlerMethod'] = 'studentSearch';
                    $_POST['searchMethod'] = 'name';
                    require 'handler.php';
                    exit();
                }else{
                    header('Location: ../client/php/studentSearch.php?'. http_build_query($validate->getErrors()));
                    exit();
                }
            }
            if(empty($_POST['club_name']) && !empty($_POST['club_id'])){

                if($validate->checkClubId($_POST['club_id'])){
                    
                    $_POST['handlerMethod'] = 'studentSearch';
                    $_POST['searchMethod'] = 'id';
                    require 'handler.php';
                    exit();
                }else{
                    header('Location: ../client/php/studentSearch.php?'. http_build_query($validate->getErrors()));
                    exit();
                }
            }
            if($validate->checkClubId($_POST['club_id']) && $validate->checkClubName($_POST['club_name'])){

                $_POST['handlerMethod'] = 'studentSearch';
                $_POST['searchMethod'] = 'both';
                require 'handler.php';
                exit();

            }else{
                header('Location: ../client/php/studentSearch.php?'. http_build_query($validate->getErrors()));
                exit();
            }
        }
    }
} else {
    echo($_POST['handlerMethod'] . '\n');
    exit;
}