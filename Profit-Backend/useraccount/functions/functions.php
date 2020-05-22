<?php

    //Clean String Values
    function clean($string){
        return htmlentities($string);
    }

    //Redirection
    function redirect($location){
        return header("location:{$location}");
    }

    //Set Session Message
    function set_message($msg){
        if(!empty($msg)){
            $_SESSION['Message']=$msg;
        }else{
            $msg="";
        }
    }

    //Display Message Function
    function display_message(){
        if(isset($_SESSION['Message'])){
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
    }

    //Generate Token
    function Token_Generator(){
        $token= $_SESSION['token']=md5(uniqid(mt_rand(),true));
        return $token;
    }

    //Send Email Function

    function send_email($eamil, $sub, $msg, $header){
        return mail($eamil, $sub, $msg, $header);
    }

    //************** User Validation Functions ************//


    //Errors Functions

    function Error_validation($Error){
        return '<div class="alert alert-danger text-center">'.$Error.' </div>';

    }

    //User Validation Function

    function user_validation(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $FirstName  = clean($_POST['FirstName']);
            $LastName   = clean($_POST['LastName']);
            $Email      = clean($_POST['Email']);
            $Pass       = clean($_POST['pass']);
            $CPass      = clean($_POST['cpass']);

            $Errors =[];
            $Min    =2;


            //Check The First Name Characters

            if(strlen($FirstName)<$Min){
                $Errors[]="First Name cannot be less than ($Min) characters.";
            }


            //Check If The Email Exists

            if(Email_Exists($Email)){
                $Errors[]="Email already registered.";
            }

            //Password & Confirm Password

            if($Pass!=$CPass){
                $Errors[]="Passwords don't match.";
            }

            if(!empty($Errors)){
                foreach($Errors as $Error){
                    echo Error_validation($Error);
                }  
            }else{
                if(user_registration($FirstName, $LastName, $Email, $Pass)){
                    set_message('<p class="alert alert-success text-center"> You have successfully registered. Please check your email.</p>');
                    redirect("login.php");
                }else{
                    set_message('<p class="alert alert-danger text-center "> 
                    Account not registered. Please try again. </p>');
                    redirect("register.php");
                }
            }
        }
    }

    // Email Exists Functions
    function Email_Exists($Email){
        $sql="SELECT * FROM user where Email='$Email'";
        $result= Query($sql);
        if(fatech_data($result)){
            return true;
        }else{
            return false;
        }
    }

    //User Registration Function

    function user_registration($FName, $LName, $Email, $Pass){
        $FirstName = escape($FName);
        $LastName  = escape($LName);
        $Email     = escape($Email);
        $Pass      = escape($Pass);

        if(Email_Exists($Email)){
            return true;
        }else {
            $Password =md5($Pass);
            $Validation_code= md5($FirstName+ microtime());

            $sql="INSERT INTO user (FirstName, LastName, Email, Password,type,Validation_Code,Active) VALUES ('$FirstName','$LastName','$Email', '$Password','0', '$Validation_code','0')";

            $result= Query($sql);
            confirm($result);

            $subject="Activate Your Account.";
            $msg= "Please click the link below to activate your account http://localhost/Profit-Backend/useraccount/activate.php?Email=$Email&Code=$Validation_code";
            $header="noreply@profit.com";
            
            send_email($Email, $subject, $msg ,$header);
            return true;
        }
    }

    //Activation function
    function activation(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $Email = $_GET['Email'];
            $Code = $_GET['Code'];

            $sql = "SELECT * FROM user WHERE Email='$Email' AND Validation_Code='$Code'";
            $result= Query($sql);
            confirm($result);
            
            if(fatech_data($result)){
                $sqlquery= "UPDATE user SET Active='1', Validation_Code='0' WHERE Email='$Email' AND Validation_Code='$Code'";
                $result2 = Query($sqlquery);
                confirm($result2);
                set_message('<p class=" alert alert-success text-center lead"> You have successfully registered. <p>');
                redirect('login.php');
            }else{
                echo '<p class="alert alert-danger text-center lead"> Account not activated . </p>';
            }
        }
    }

    //User Login Validation Function
    function login_validation(){
        $Errors=[];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $UserEmail= clean($_POST['UEmail']);
            $UserPass= clean($_POST['UPass']);
            $Remember= isset($_POST['remember']);

            if(empty($UserEmail)){
                $Errors[]="Please enter your email.";
            }
            if(empty($UserPass)){
                $Errors[]="Please enter your password.";
            }
            if(!empty($Errors)){
                foreach($Errors as $Error){
                    echo  Error_validation($Error);
                }
            }else{
                if(!user_login($UserEmail,$UserPass,$Remember)){
                    echo Error_validation("Please enter the correct email or password./Your account is not verified yet.");

                }
            }
        }
    }





    //User Login Function
    function user_login($UEmail,$UPass,$Remember){
        $query=" SELECT * FROM user WHERE Email='$UEmail' AND Active='1' AND type='0' ";
        $result= Query($query);

        if($row=fatech_data($result)){
            $db_pass= $row['Password'];
            if(md5($UPass)==$db_pass){
                if($Remember == true){
                    setcookie('email', $UEmail, time()+86400);
                }
                redirect('../index.php');
                $_SESSION['Email']=$UEmail;
                return true;
            }else{
                return false;
            }
        }else{
            $query2=" SELECT * FROM user WHERE Email='$UEmail' AND Active='1' AND type='1' ";
            $result2= Query($query2);

            if($row=fatech_data($result2)){
                $db_pass= $row['Password'];
                if(md5($UPass)==$db_pass){
                    if($Remember == true){
                        setcookie('email', $UEmail, time()+86400);
                    }
                    redirect('../Admin/category/index.php');
                    $_SESSION['Email']=$UEmail;
                    return true;
                }else{
                    return false;
                }    
            }
        }
    }


    // Logged In Function
    function logged_in(){
        if(isset($_SESSION['Email']) || isset($_COOKIE['email'])){
            return true;
        }else{
            return false;
        }
    }

    //************** Recover Functions ************//

    // Recover Password 

    function recover_password(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
           if(isset($_SESSION['token']) && ($_POST['token']==$_SESSION['token'])){
                $Email =$_POST["UEmail"];
                if(Email_Exists($Email)){
                    
                    $code = md5($Email.microtime());
                    setcookie('temp_code',$code, time()+300);

                    $sql=" UPDATE user SET Validation_Code='$code' WHERE Email='$Email' ";
                    Query($sql);
                    $Subject= "Please reset the password.";
                    $Message= "Please click the link below to reset your password http://localhost/Profit-Backend/useraccount/code.php?Email='$Email'&Code='$code'";
                    $header= "noreply@profit.com";

                    if(send_email($Email,$Subject,$Message,$header)){
                        echo '<div class="alert alert-success"> Please check your email. </div>';

                    }else{
                        echo Error_validation("We Coudn't Send An Email.");
                    }
                }else{
                    echo Error_validation("Email Not Found.");
                }

            }else{
                redirect("../index.html");
            }
        }
    }

    //Validation Code Function

    function validation_code(){
        if(isset($_COOKIE['temp_code'])){
            if(!isset($_GET['Email']) && !isset($_GET['Code'])){
                redirect("index.php");
            }else if(empty($_GET['Email']) && empty($_GET['Code'])){
                redirect('index.php');
            }else{
                if(isset($_POST['recover-code'])){
                    $Code= $_POST['recover-code'];
                    $Email=$_GET['Email'];

                    $query= "SELECT * FROM user WHERE Validation_Code='$Code' AND Email='$Email'";
                    $result= Query($query);

                    if(fatech_data($result)){
                        setcookie('temp_code',$Code,time()+300);
                        redirect("reset.php?Email='$Email'&Code='$Code'");
                    }else{
                        echo Error_validation("Query Failed");
                    }
                }
            }

        }else{
            set_message('<div class="alert alert-danger"> Your code has been expired. :) </div>');
            redirect('recover.php');
        }
    }

    // Reset Password Function

    function reset_password(){
        if(isset($_COOKIE['temp_code'])){
            if(isset($_GET['Email']) && isset($_GET['Code'])){
                if(isset($_SESSION['token']) && isset($_POST['token'])){
                    if($_SESSION['token']==$_POST['token']){
                        if($_POST['reset-pass'] === $_POST['reset-c-pass']){
                            $Password= md5($_POST['reset-pass']);
                            $Email=$_GET['Email'];
                            $query= " UPDATE user SET Password='$Password', Validation_Code=0 WHERE Email=$Email";
                            $result = Query($query);

                            if($result){
                                set_message('<div class="alert alert-success"> Your password has been activated. </div>');
                                redirect("login.php");

                            }else{
                                set_message('<div class="alert alert-danger">Something went wrong .</div>');
                            }

                        }else{
                            set_message('<div class="alert alert-danger"> Passwords do not match . </div>');

                        }
                    }else{
                        set_message('<div class="alert alert-danger"> Your code or email has not matched. </div>');

                    }

                }

            }else{
                set_message('<div class="alert alert-danger">  Your code or email has not matched.</div>');

            }

        }else{
            set_message('<div class="alert alert-danger"> Your period time has been expired. </div>');
        }

    }

    //Redirect Validation Function
    function redirect_validation(){
        $Errors=[];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $UserEmail= clean($_POST['UEmail']);
            $UserPass= clean($_POST['UPass']);
            $Remember= isset($_POST['remember']);

            if(empty($UserEmail)){
                $Errors[]="Please enter your email.";
            }
            if(empty($UserPass)){
                $Errors[]="Please enter your password.";
            }
            if(!empty($Errors)){
                foreach($Errors as $Error){
                    echo  Error_validation($Error);
                }
            }else{
                if(user_login($UserEmail,$UserPass,$Remember)){
                    if(user_login($UserEmail,$UserPass,$Remember)){
                    redirect(" ../single-item.php?ID=".$_GET['ID']);
                }else{
                     echo Error_validation("Please enter the correct email or password. /Your account is not verified yet.");
                }
            }
        }
    }


?>
