<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once("connection.php");

$con =$webpage->GetConnection();
//Validating
ob_start();
include "validate.php";
$result = ob_get_clean();

$validateJSON = json_decode($result);
if(!$validateJSON->valid)
	exit($validateJSON->message);
//

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (pg_prepare($con, "add-user", 'INSERT INTO "public"."accounts" ("username", "password", "email", "activation_code") VALUES ($1, $2, $3, $4);')) {
	$password = hash('sha512', $password);
	$uniqid = uniqid();
	pg_execute($con, "add-user", array($username, $password, $email, $uniqid));
	SendVerificationCode($uniqid, $email);
	RegistrationSuccessful($email);
} else {
	echo 'Could not prepare statement!';
}

function SendVerificationCode($uniqid, $email) {
	$from    = "hextaleauth@gmail.com";
	$subject = 'Account Activation For HexTale';
	//$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";

	$activate_link = 'http://' . $_SERVER['SERVER_NAME'] . '/RegisterDir/activate.php?email=' . $email . '&code=' . $uniqid;
	$message = '<p>Please click the following link to activate your account: <br><a href="' . $activate_link . '">' . $activate_link . '</a></p>';
	$altMessage = 'Please got to the following address to activate your account: "' . $activate_link;

	$mail = new PHPMailer(true);

	// Settings
	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';

	$mail->Host       = "smtp.gmail.com";       
	$mail->SMTPAuth   = true;                  
	$mail->Username   = $from;            
	$mail->Password   = "iaerecjloiypwjuv";            
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	// Content
	$mail->setFrom($from);   
	$mail->addAddress($_POST['email']);

	$mail->isHTML(true);                       // Set email format to HTML
	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->AltBody = $altMessage;

	$mail->send();
}
function RegistrationSuccessful($email) {
	header("location: ../index.php?page=successful-registration");
}
?>