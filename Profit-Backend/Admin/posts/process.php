<?php

$mysqli = new mysqli('localhost', 'root', '', 'profitphpmyadmin') or die(mysqli_error($mysqli));

$resultSet = $mysqli->query("SELECT name FROM programcategory"); 

$update = false;
$Title = '';
$Description = '';
$ProgramCategory = '';
$ID = 0;

if (isset($_POST['save'])){
    
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $ProgramCategory = $_POST['ProgramCategory'];
    //image insertion
    $img = addslashes($_FILES['img']['name']);
    $tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));

    $mysqli->query("INSERT INTO program (Title, Description, name, img, ProgramCategory) VALUES('$Title', '$Description', '$img','$tmpname', '$ProgramCategory')") or die($mysqli->error);
    

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $ID = $_GET['delete'];
    $mysqli->query("DELETE FROM program WHERE ID=$ID") or die($mysqli->error());

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $ID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM program WHERE ID=$ID") or die($mysqli->error());
    if($result->num_rows){
        $row = $result->fetch_array();
        $Title = $row['Title'];
        $Description = $row['Description'];
        $ProgramCategory = $row['ProgramCategory'];
        $img = $row['name'];
        
    }

}

if (isset($_POST['update'])){
    $ID = $_POST['ID'];
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $ProgramCategory = $_POST['ProgramCategory'];
    $img = $_FILES['img']['name'];

    $mysqli->query("UPDATE program SET Title='$Title', Description='$Description', ProgramCategory='$ProgramCategory', img='$img' WHERE ID=$ID") or die($mysqli->error);

    header('location: index.php');
}
