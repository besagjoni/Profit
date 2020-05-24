<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'profitphpmyadmin';

$mysqli = new mysqli($host, $user, $pass, $db);

$program = $_POST['statusType'];
$nutrition = $_POST['statusType'];
$user = 55;

$qry = $mysqli->query("INSERT INTO savedprogram(UserID,ProgramID) VALUES($user,$program)");
$qry2 = $mysqli->query("INSERT INTO savednutrition(UserID,NutritionID) VALUES($user,$nutrition)");
if ($qry){
    echo "Saved successfully";
}elseif($qry2){
    echo "nutrtition saved succesfully";
}

?>