<?php

$mysqli = new mysqli('localhost', 'root', '', 'profitphpmyadmin') or die(mysqli_error($mysqli));

$resultSet = $mysqli->query("SELECT name FROM nutritioncategory");

$update = false;
$Title = '';
$Description = '';
$NutritionCategory = '';
$ID = 0;

if (isset($_POST['save'])){
    
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $NutritionCategory = $_POST['NutritionCategory'];
    //image insertion
    $img = addslashes($_FILES['img']['name']);
    $tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    
        
    $mysqli->query("INSERT INTO nutrition (Title, Description, name, img, NutritionCategory) VALUES('$Title', '$Description', '$img','$tmpname', '$NutritionCategory')") or die($mysqli->error);

    header("location: indexnutrition.php");
}

if (isset($_GET['delete'])){
    $ID = $_GET['delete'];
    $mysqli->query("DELETE FROM nutrition WHERE ID=$ID") or die($mysqli->error());

    header("location: indexnutrition.php");
}

if (isset($_GET['edit'])){
    $ID = $_GET['edit'];
    $update = true;   
    $result = $mysqli->query("SELECT * FROM nutrition WHERE ID=$ID") or die($mysqli->error());
    if($result->num_rows){
        $row = $result->fetch_array();
        $Title = $row['Title'];
        $Description = $row['Description'];
        $NutritionCategory = $row['NutritionCategory'];
        
        
    }
}

if (isset($_POST['update'])){
    $ID = $_POST['ID'];
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $NutritionCategory = $_POST['NutritionCategory'];
    $img = $_FILES['img']['name'];
    
    $mysqli->query ("UPDATE nutrition SET Title='$Title', Description='$Description', name='$tmp_name', img='$img', NutritionCategory='$NutritionCategory' WHERE ID=$ID") or die($mysqli->error);
    
    move_uploaded_file($_FILES['img']['tmp_name'], "img/".$img);
    
    
    header('location:indexnutrition.php');
    
}

?>


