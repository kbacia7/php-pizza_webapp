<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_(true);

$firstName = isset($_POST['firstName']) ? ($_POST['firstName']) : null;
$lastName = isset($_POST['lastName']) ? ($_POST['lastName']) : null;
$eMail = isset($_POST['eMail']) ? ($_POST['eMail']) : null;
$topic = isset($_POST['topic']) ? ($_POST['topic']) : null;
$message = isset($_POST['message']) ? ($_POST['message']) : null;
$response = array(
	'complete' => false
);
if($firstName != null && $lastName != null)
{
	try {
		$r = new RandomString();
		$p = $r->Random(30);
		$d = array(
			'login' => $eMail,
			'firstName' => $firstName,
			'lastName' => $lastName,
			'password' => $p
		);
		UserManager::create($d);

		$bodyMsg = sprintf("Dziękujemy za kontakt %s %s. Postaramy się jak najszybciej odpowiedzieć, rozmowy prowadzone z nami jak i odpowiedzi wysyłaj proszę z tego miejsca. %s", $firstName, $lastName, $p);
		mail($eMail, "Kontakt", $bodyMsg, "From: sender@pizzeriatemplate.cba.pl");
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}
echo json_encode($response);
?>