<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'profitphpmyadmin';

$mysqli = new mysqli($host, $user, $pass, $db);

$program = $_POST['statusType'];
$nutrition = $_POST['statusType'];
$user = 55;

$done = $mysqli->query("DELETE FROM savedprogram WHERE savedprogram.UserID=$user AND savedprogram.ProgramID=$program ");
$done2 = $mysqli->query("DELETE FROM savednutrition WHERE savednutrition.UserID=$user AND savednutrition.NutritionID=$nutrition ");
if ($done){
    echo "Unsaved successfully";
}elseif($done2){
    echo "nutrition unsaved successfully";
}

?>