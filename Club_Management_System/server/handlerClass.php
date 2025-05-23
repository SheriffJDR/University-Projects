<?php

class Handler{
    public $error = array();
    public $response = array(); 
    private $connect;
    public function __construct(){
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->connect = new mysqli("localhost","root",null,"400008020");
        
        if($this->connect->connect_error){
            $this->error['connection'] = $this->connect->connect_error;
            header('Location: ../client/php/error.php?error='. http_build_query($this->error));
            return;
        }
    }
    public function studentLogIn():bool{

        if(isset($_SESSION['studentUser'])){
            $this->error['login'] = 'A user is already logged in.';
            return false;
        }

        $sql = $this->connect->prepare('SELECT * FROM student_credential WHERE student_id = ? AND password = ?');
        $sql->bind_param('is',$_POST['studentId'],$_POST['password']);
        $sql->execute();
        $result = $sql->get_result();

        if($result->num_rows == 1){
            
            $sql2 = $this->connect->prepare('SELECT student_id,student_fname, student_lname FROM student where student_id = ?');
            $sql2->bind_param('i',$_POST["studentId"]);
            $sql2->execute();
            $result2 = $sql2->get_result();
            
            if($result2->num_rows == 1){

                $row = $result2->fetch_assoc();
                $_SESSION['studentUser']['id'] = $row['student_id'];
                $_SESSION['studentUser']['fname'] = $row['student_fname'];
                $_SESSION['studentUser']['lname'] = $row['student_lname'];

            }else{
                $this->error['login'] = 'Could not find that student.';
                return false;
            }

        }else{
            $this->error['login'] = 'Incorrect Id or Password.';
            return false;
        }

        return true;
    }
    public function adminLogIn():bool{

        if(isset($_SESSION['adminUser'])){
            $this->error['login'] = 'A user is already logged in.';
            return false;
        }

        $sql = $this->connect->prepare('SELECT * FROM admin_credential WHERE admin_id = ? AND password = ?');
        echo(gettype($sql));
        $sql->bind_param('is',$_POST['adminId'],$_POST['password']);
        $sql->execute();
        $result = $sql->get_result();

        if($result->num_rows == 1){
            
            $sql3 = $this->connect->prepare("SELECT admin_id,admin_fname, admin_lname FROM admin WHERE admin_id = ?");
            $sql3->bind_param("i",$_POST["adminId"]);
            $sql3->execute();
            $result2 = $sql3->get_result();

            if($result2->num_rows == 1){

                $row = $result2->fetch_assoc();
                $_SESSION['adminUser']['id'] = $row['admin_id'];
                $_SESSION['adminUser']['fname'] = $row['admin_fname'];
                $_SESSION['adminUser']['lname'] = $row['admin_lname'];

            }else{
                $this->error['login'] = 'Could not find that admin.';
                return false;
            }

        }else{
            $this->error['login'] = 'Incorrect Id or Password.';
            return false;
        }

        return true;
    }
    public function logOutUser(){

        if(isset($_SESSION['adminUser'])){

            unset($_SESSION['adminUser']);

            if(isset($_POST['adminUser'])){
                
                $this->error['login'] = "Could not log out user.";
                return false;
            }
            return true;
        }
        if(isset($_SESSION['studentUser'])){

            unset($_SESSION['studentUser']);

            if(isset($_POST['studentUser'])){
                
                $this->error['login'] = "Could not log out user.";
                return false;
            }
            return true;
        }
        return false;
    }
    public function getClubCount():int{
        $sql = ("SELECT COUNT(club_id) FROM club");
        $result = $this->connect->query($sql);
        $total = $result->fetch_row();
        return $total[0];
    }
    public function getAvailableClubCount():int{
        $sql = ("SELECT COUNT(club_id) FROM club WHERE club_status = 'active'");
        $result = $this->connect->query($sql);
        $total = $result->fetch_row();
        return $total[0];
    }
    public function getApplicationCount():int{

        $sql =$this->connect->prepare("SELECT COUNT(application_id) FROM application WHERE student_id = ?");
        $sql->bind_param("i", $_SESSION["studentUser"]["id"]);
        $sql->execute();

        $result = $sql->get_result();
        $total = $result->fetch_row();

        return $total[0];
    }
    public function getPendingApplicationCount():int{

        $sql = $this->connect->prepare("SELECT COUNT(application_id) FROM application WHERE application_status = 'pending' AND student_id = ?");
        $sql->bind_param("i", $_SESSION["studentUser"]['id'] );
        $sql->execute();

        $result = $sql->get_result();
        $total = $result->fetch_row();

        return $total[0];
    }
    public function getFullClubInfo():array{
        $sql = ('SELECT * FROM club');
        $result = $this->connect->query($sql);

        while($row = $result->fetch_assoc()){
            $output[] = $row;
        }
        return $output; 
    }
    public function getAllClubInfo():array{
        $sql = ('SELECT club_id, club_name, club_description FROM club');
        $result = $this->connect->query($sql);

        while($row = $result->fetch_assoc()){
            $output[] = $row;
        }
        return $output; 
    }
    public function getRegisteredClubInfo():array{

        $sql = $this->connect->prepare("SELECT club.club_id, club_name, club_description FROM club,club_membership WHERE club_membership.student_id = ? AND club_membership.club_id = club.club_id");
        $sql->bind_param("i", $_SESSION["studentUser"]["id"]);
        $sql->execute();

        $result = $sql->get_result();
        $output = array();

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){
                $output[] = $row;
            }
            return $output;
        }

        return $output;
    }
    // public function getNotRegisteredClubInfo():array{

    //      $sql = $this->connect->prepare("SELECT club.club_id, club_name, club_description FROM club,club_membership WHERE NOT club_membership.student_id = ? AND club_membership.club_id = club.club_id");
    //     $sql->bind_param("i", $_SESSION["user"]["id"]);
    //     $sql->execute();
    //     $result = $sql->get_result();
        
    //     while($row = $result->fetch_assoc()){
    //         $output[] = $row;
    //     }
    //     return $output;
    // }

    public function getApprovedApplicationCount():int{
        
        $sql = $this->connect->prepare("SELECT COUNT(application_id) FROM application WHERE student_id = ? AND application_status = 'accepted'");
        $sql->bind_param("i", $_SESSION["studentUser"]['id'] );

        $sql->execute();
        $result = $sql->get_result();
        $total = $result->fetch_row();

        return $total[0];
    }
    public function getRejectedApplicationCount():int{

        $sql = $this->connect->prepare("SELECT COUNT(application_id) FROM application WHERE student_id = ? AND application_status = 'rejected'");
        $sql->bind_param("i", $_SESSION["studentUser"]['id'] );

        $sql->execute();
        $result = $sql->get_result();
        $total = $result->fetch_row();

        return $total[0];
    }
    public function createApplication():bool{

        $sql = $this->connect->prepare("SELECT advisor_id FROM club WHERE club_id = ?");
        $sql->bind_param("i", $_POST["clubId"]);
        $sql->execute();
        $result= $sql->get_result();

        $row = $result->fetch_assoc();
        $adminID = $row ["advisor_id"];
  
    
        $sql1 = $this->connect->prepare("INSERT INTO application ( advisor_id, club_id, student_id, application_status, date) VALUES(?,?,?,'pending',?)");
        $date = date('Y-m-d');
       //cho("Insert into application values(".$adminID.",".$_POST['clubId'].",".$_SESSION['user']['id'].",pending,".$date.")");
        $sql1->bind_param("iiis", $adminID,$_POST['clubId'], $_SESSION['studentUser']['id'], $date);

        if($sql1->execute()){
            return true;
        }

        $this->error['error'] = $this->connect->error;
        return false;
    }
    public function getStudentApplications():array{

        $sql = $this->connect->prepare("SELECT application.application_id,club.club_name,application.date,application.application_status FROM application,club WHERE application.student_id = ? AND application.club_id = club.club_id");
        $sql->bind_param("i", $_SESSION["studentUser"]['id']);
        $sql->execute();

        $result = $sql->get_result();
        $output = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $output[] = $row;
            }
            return $output;
        }
        
        return $output; 

    }
    public function getAllApplications():array{

        $sql = ("select student.student_fname,student_lname,club.club_id,club.club_name,application.application_id,application.date,application.application_status from application,student,club where (application.student_id = student.student_id and application.club_id = club.club_id)");
        $result = $this->connect->query($sql);

        $output = array();

        if($result->num_rows > 0){
            
            while($row = $result->fetch_assoc()){
                $output[] = $row;
            }

            return $output; 
        }else{
            return $output;
        }
        

    }
    public function getAllRejectedCount():int{

        $sql = ("SELECT COUNT(application_id) FROM application WHERE application_status = 'rejected'");
        $result = $this->connect->query($sql);
        $output = array();

        if($result->num_rows > 0){

            $row = $result->fetch_row();
            $output = $row[0];

            return $output;
            
        }else{
            return 0;
        }
    }
    public function getAllPendingCount():int{

        $sql = ("SELECT COUNT(application_id) FROM application WHERE application_status = 'pending'");
        $result = $this->connect->query($sql);

        if($result->num_rows > 0){

            $row = $result->fetch_row();
            $output = $row[0];

            return $output;
            
        }else{
            return 0;
        }
    } 
    public function getAllAcceptedCount():int{

        $sql = ("SELECT COUNT(application_id) FROM application WHERE application_status = 'accepted'");
        $result = $this->connect->query($sql);

        if($result->num_rows > 0){

            $row = $result->fetch_row();
            $output = $row[0];

            return $output;
            
        }else{
            return 0;
        }
    }
    public function rejectApplication():bool{

        $sql = $this->connect->prepare("UPDATE application SET application_status = 'rejected' WHERE application_id = ?");
        $sql->bind_param("i", $_POST['application_id']);
        $sql->execute();
        print_r($_POST);

        if($sql === false){
            $this->error['query'] = 'Could not execute query.';
        }
   
        $result = $sql->affected_rows;

        if($result == 1){
            return true;
        }
        $this->error['adminAction'] = 'Could not complete operation. (Application rejection)';

        return false;
    }
    public function acceptApplication():bool{

        $sql = $this->connect->prepare("UPDATE application SET application_status = 'accepted' WHERE application_id = ?");
        $sql->bind_param("i", $_POST['application_id']);

        $sql->execute();

        if($sql === false){
            $this->error['query'] = 'Could not execute query.';
        }

        $result = $sql->affected_rows;

        if($result == 1){
            return true;
        }
        $this->error['adminAction'] = 'Could not complete operation. (Application acceptance)';
        return false;
    }
    //Adds Club record with one meeting to the database provided that all constraints are met.
    public function addClubWIthOneMeeting():bool{

        //Checks to see if advisor id is a valid id
        $sql = $this->connect->prepare("SELECT * FROM staff_advisor WHERE advisor_id = ?");
        $sql->bind_param("i", $_POST["advisor_id"]);
        $sql->execute();
        $result = $sql->get_result();

        if($result->num_rows == 0){
            $this->error["query"] = "Advisor Id not found.";
            return false;
        }

        $sql2 = $this->connect->prepare("SELECT COUNT(club_id) FROM club WHERE advisor_id = ?");
        $sql2->bind_param("i", $_POST["advisor_id"]);
        $sql2->execute();

        $result2 = $sql2->get_result();
        $total = $result2->fetch_row();

        
        if($total[0] >= 2){
            
            $this->error["query"] = "That Staff Adivsor is already managing two clubs please enter another advisor's id.";
            return false;
        }

        //Inserts club information into the club table 
        $sql3 = $this->connect->prepare("INSERT INTO club (club_name, club_description,advisor_id,membership_size,club_status )VALUES (?,?,?,?,'active')");
        $sql3->bind_param("ssii", $_POST["club_name"],$_POST['club_description'],$_POST['advisor_id'], $_POST['membership_size']);
        $sql3->execute();


        //If club record insertion is successful attempt to insert meeting information
        if($sql3->affected_rows == 1){
            
            $insert = $sql3->insert_id;
            $sql4 = $this->connect->prepare('INSERT INTO meeting (club_id,meeting_time,meeting_location,meeting_day) VALUES (?,?,?,?)');
            $sql4->bind_param('isss', $insert,$_POST['meeting_time1'],$_POST['meeting_location1'], $_POST['meeting_day1']);
            $sql4->execute();

            if($sql4->affected_rows == 1){
                return true;
            }else{
                $this->error['query'] = 'Could not create meeting record.';
                return false;
            }
            
        }

        $this->error['query'] = "Could not create club record.";
        return false;
    }
    //Adds Club record with two meetings to the database provided that all constraints are met.
    public function addClubWIthTwoMeeting():bool{

        //Checks to see if advisor id is a valid id
        $sql = $this->connect->prepare("SELECT * FROM staff_advisor WHERE advisor_id = ?");
        $sql->bind_param("i", $_POST["advisor_id"]);
        $sql->execute();
        $result = $sql->get_result();

        if($result->num_rows == 0){
            $this->error["query"] = "Invalid advisor Id.";
            return false;
        }

        $sql2 = $this->connect->prepare("SELECT COUNT(club_id) FROM club WHERE advisor_id = ?");
        $sql2->bind_param("i", $_POST["advisor_id"]);
        $sql2->execute();
        $result2 = $sql2->get_result();
        $total = $result2->fetch_row();

        
        if($total[0] >= 2){
            $this->error["query"] = "That Staff Adivsor is already managing two clubs please enter another advisor's id.";
            return false;
        }

        //Inserts club information into the club table 
        $sql3 = $this->connect->prepare("INSERT INTO club (club_name, club_description,advisor_id,membership_size,club_status )VALUES (?,?,?,?,'active')");
        $sql3->bind_param("ssii", $_POST["club_name"],$_POST['club_description'],$_POST['advisor_id'], $_POST['membership_size']);
        $sql3->execute();


        //If club record insertion is successful attempt to insert meeting information for the two meweeting times
        if($sql3->affected_rows == 1){

            $insert = $sql3->insert_id;
            $sql4 = $this->connect->prepare('INSERT INTO meeting (club_id,meeting_time,meeting_location,meeting_day) VALUES (?,?,?,?),(?,?,?,?)');
            
            $sql4->bind_param('isssisss', $insert,$_POST['meeting_time1'],$_POST['meeting_location1'], $_POST['meeting_day1'],
            $insert,$_POST['meeting_time2'],$_POST['meeting_location2'], $_POST['meeting_day2']);

            $sql4->execute();

            if($sql4->affected_rows == 1){
                return true;
            }else{
                $this->error['query'] = 'Could not create meeting record.';
                return false;
            }
            
        }
        $this->error['query'] = "Could not create club record.";
        return false;
    }
    public function search($method){

        if($method == 'id'){

            $sql = $this->connect->prepare('SELECT * FROM club WHERE club_id = ?');
            $sql->bind_param('i', $_POST['club_id']);
            $sql->execute();
            $result = $sql->get_result();

            if($result->num_rows == 1){

                $this->response['result'] = $result->fetch_assoc();
                return true;
            }
            $this->response['result'] = 'No result';
            return false;

        }if($method == 'name'){

            $sql = $this->connect->prepare('SELECT * FROM club WHERE club_name = ?');
            $sql->bind_param('s', $_POST['club_name']);
            $sql->execute();
            $result = $sql->get_result();

            if($result->num_rows == 1){

                $this->response['result'] = $result->fetch_assoc();
                return true;
            }

            $this->response['result'] = 'No result';
            return false;
        }
        if($method == 'both'){

            $sql = $this->connect->prepare('SELECT * FROM club WHERE club_id = ? AND club_name = ?');
            $sql->bind_param('is', $_POST['club_id'],$_POST['club_name']);
            $sql->execute();
            $result = $sql->get_result();

            if($result->num_rows == 1){

                $this->response['result'] = $result->fetch_assoc();
                return true;
            }
            
            $this->response['result'] = 'No result';
            return false;
        }
    }

    public function view(): array{

        $sql = $this->connect->prepare('SELECT * FROM club WHERE club_id = ?');
        $sql->bind_param('i', $_POST['clubId']);
        $sql->execute();
        $result = $sql->get_result();
        $output = array();

        if($result->num_rows == 1){

            $output['result'] = $result->fetch_assoc();
            $sql1 = $this->connect->prepare('SELECT * FROM meeting WHERE club_id = ?');
            $sql1->bind_param('i', $_POST['clubId']);
            $sql1->execute();
            $result1 = $sql1->get_result();

            while($row = $result1->fetch_assoc()){
                $output['meeting'] = $row;
            }
            return $output;
        }
        $output['epmty'] = 'Yes';
        return $output;
    }
    public function __destruct(){
        $this->connect->close();
    }
    
    public function getErrors(): array{
        return $this->error;
    }
    public function getResponse(): array{
        return $this->response;
    }

}