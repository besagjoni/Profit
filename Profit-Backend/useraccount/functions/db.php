<?php

    $con = mysqli_connect('localhost','root','','profitphpmyadmin');
    
    //function Clean String Values
    function escape($string){
        global $con;
        return mysqli_real_escape_string($con,$string);
    }

    //Query Function
    function Query($query){
        global $con;
        return mysqli_query($con, $query);
    }

    //Confirmation function
    function confirm($result){
        global $con;
        if(!$result){
            die('Query Failed'.mysqli_error($con));
        }
    }

    //fatech Data From Database 
    function fatech_data($result){
        return mysqli_fetch_assoc($result);
    }

    //Row values from database
    function row_count($count){
        return mysqli_num_rows($count);
    }
?>