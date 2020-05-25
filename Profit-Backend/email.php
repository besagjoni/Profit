<?php
$email_to = "info.profit2020@gmail.com";
$name = $_POST["name"];
$email_from = $_POST["email"];
$email_subject = $_POST["subject"];
$message = $_POST["message"];
$headers = "From: " . $email_from . "\n";
$headers .= "Reply-To: " . $email_from . "\n";

$message = "Name: ". $name . "\r\nMessage: " . $message;

ini_set("email_from", $email_from);
$sent = mail($email_to, $email_subject, $message, $headers, "-f" .$email_from);
if ($sent)
{
echo "Email-i u dergua! Faleminderit!";
} else {
echo "Pati nje problem me dergimin e email-it! Ju lutem, provoni perseri.";
}

?>

