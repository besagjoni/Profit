<?php


$mysqli = new mysqli('localhost', 'root', '', 'profitphpmyadmin') or die($mysqli_error($mysqli));

$update = false;
$Name = '';
$ID=0;

if (isset($_POST['save'])){
    $Name = $_POST['Name'];


    $mysqli->query("INSERT INTO nutritioncategory (Name) VALUES('$Name')") or 
        die($mysqli->error); 

    header("location: indexnutrition.php");

}

if (isset($_GET['delete'])){
    $ID = $_GET['delete'];
    $mysqli->query("DELETE FROM nutritioncategory WHERE ID=$ID") or die($mysqli->error());
    header("location: indexnutrition.php");
}

if (isset($_GET['edit'])){
    $ID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM nutritioncategory WHERE ID=$ID") or die($mysqli->error());
    if($result->num_rows){
        $row = $result->fetch_array();
        $Name = $row['Name'];
    
    }

}

if (isset($_POST['update'])){
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];

    $mysqli->query("UPDATE nutritioncategory SET Name='$Name' WHERE ID=$ID") or die($mysqli->error);

    header('location: indexnutrition.php');
}