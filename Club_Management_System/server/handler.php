<?php

require_once('handlerClass.php');

if(isset($_POST['handlerMethod'])){

    if($_POST['handlerMethod'] == 'studentLogIn'){

        $handler = new Handler();

        if($handler->studentLogIn()){
            header('Location: ../client/php/studentDash.php');
            return;
        }
        header('Location: ../client/php/index.php?'. http_build_query($handler->getErrors()));
       
    }
    if($_POST['handlerMethod'] == 'adminLogIn'){
        $handler = new Handler();

        if($handler->adminLogIn()){
            header('Location: ../client/php/adminDash.php');
            return;
        }

        header('Location: ../client/php/admin.php?'. http_build_query($handler->getErrors()));
    }
    if($_POST['handlerMethod'] == 'studentLogOut'){
        $handler = new Handler();

        if($handler->logOutUser()){
        
            header('Location: ../client/php/index.php');
            return;
        }else{
            header('Location:../client/php/index.php'. http_build_query($handler->getErrors()));
        }
    }
    if($_POST['handlerMethod'] == 'apply'){

        $handler = new Handler();
        $successMsg = 'Application has been submitted successfully.';
        
        if($handler->createApplication()){
            
            header('Location: ../client/php/studentDash.php?success='.urlencode($successMsg));
        }
        else{
            header('Location: ../client/php/studentDash.php'. http_build_query($handler->getErrors()));
        }
    }
    if($_POST['handlerMethod'] == 'view'){
        $handler = new Handler();

        if($handler->logOutUser()){
            header('Location: ../client/php/view.php');
            return;
        }else{
            header('Location:../client/php/view.php'. http_build_query($handler->getErrors()));
        }
    }
    if($_POST['handlerMethod'] == 'adminLogOut'){
        $handler = new Handler();

        if($handler->logOutUser()){
            header('Location: ../client/php/admin.php');
            return;
        }else{
            header('Location:../client/php/admin.php?'. http_build_query($handler->getErrors()));
        }
    }
    if($_POST['handlerMethod'] == 'reject'){
        $handler = new Handler();
        $string = "Application #".$_POST['application_id']." has been rejected.";

        if($handler->rejectApplication()){
            header('Location: ../client/php/adminApplication.php?message='. urlencode($string));
            return;
        }else{
            header('Location:../client/php/adminApplication.php?'. http_build_query($handler->getErrors()));
        }
    }
    if($_POST['handlerMethod'] == 'accept'){
        $handler = new Handler();
        $string = "Application #".$_POST['application_id']." has been accepted.";

        if($handler->acceptApplication()){
            header('Location:../client/php/adminApplication.php?message='. urlencode($string));
            return;
        }else{
            header('Location:../client/php/adminApplication.php?'. http_build_query($handler->getErrors()));
        }
    }
    if($_POST['handlerMethod'] == 'addClubWithOneMeeting'){

        $handler = new Handler();
        $string = "Club has been successfully added to the system.";

        if($handler->addClubWIthOneMeeting()){

            header('Location: ../client/php/adminDash.php?success='.urldecode($string));
        }else{
            header('Location: ../client/php/addClub.php?'. http_build_query($handler->getErrors()));
        }
    }
    if($_POST['handlerMethod'] == 'addClubWithTwoMeetings'){
        
        $handler = new Handler();
        $string = "Club has been successfully added to the system.";

        if($handler->addClubWIthTwoMeeting()){
            
            header('Location: ../client/php/adminDash.php?success= '.urldecode($string));
            
        }else{
            
            header('Location: ../client/php/addClub.php?'. http_build_query($handler->getErrors()));
        }
    }
    if($_POST['handlerMethod'] == 'editClub'){

    }
    if($_POST['handlerMethod'] == 'adminSearch'){
        
        $handler = new Handler();

        if(!isset($_POST['searchMethod'])){

            $error = array();
            $error['error'] = 'Could not determine search method.';
            header('Location: ../client/php/adminSearch.php?'. http_build_query($error));
            exit();
        }
        if($_POST['searchMethod'] == 'name'){

            if($handler->search('name')){
                header('Location:../client/php/adminSearch.php?'.http_build_query($handler->getResponse()));
                exit();
            }else{
                header('Location: ../client/php/adminSearch.php?'.http_build_query($handler->getErrors()));
                exit();
            }
        }
        if($_POST['searchMethod'] == 'id'){

            if($handler->search('id')){
                header('Location: ../client/php/adminSearch.php?'.http_build_query($handler->getResponse()));
                exit();
            }else{
                header('Location: ../client/php/adminSearch.php?'.http_build_query($handler->getErrors()));
                exit();
            }
        }
        if($_POST['searchMethod'] == 'both'){

            if($handler->search('both')){
                header('Location: ../client/php/adminSearch.php?'.http_build_query($handler->getResponse()));
                exit();
            }else{
                header('Location: ../client/php/adminSearch.php?'.http_build_query($handler->getErrors()));
                exit();

            }
        }
      
    }
    if($_POST['handlerMethod'] == 'studentSearch'){
        $handler = new Handler();

        if(!isset($_POST['searchMethod'])){

            $error = array();
            $error['error'] = 'Could not determine search method.';
            header('Location: ../client/php/studentSearch.php?'. http_build_query($error));
            exit();
        }
        if($_POST['searchMethod'] == 'name'){

            if($handler->search('name')){
                header('Location:../client/php/studentSearch.php?'.http_build_query($handler->getResponse()));
                exit();
            }else{
                header('Location: ../client/php/studentSearch.php?'.http_build_query($handler->getErrors()));
                exit();
            }
        }
        if($_POST['searchMethod'] == 'id'){

            if($handler->search('id')){
                header('Location: ../client/php/studentSearch.php?'.http_build_query($handler->getResponse()));
                exit();
            }else{
                header('Location: ../client/php/studentSearch.php?'.http_build_query($handler->getErrors()));
                exit();
            }
        }
        if($_POST['searchMethod'] == 'both'){

            if($handler->search('both')){
                header('Location: ../client/php/studentSearch.php?'.http_build_query($handler->getResponse()));
                exit();
            }else{
                header('Location: ../client/php/studentSearch.php?'.http_build_query($handler->getErrors()));
                exit();

            }
        }
    }

}else{
    // $error  = array("error" => "Could not determine handler method.");

    // if(isset($_SESSION["adminUser"])){
    //     header('Location: ../client/php/admin.php?'. http_build_query($error));
    // }else{
    //     header('Location: ../client/php/index.php?'. http_build_query($error));
    // }
    
}