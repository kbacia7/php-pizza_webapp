<?php
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
		$us = UserManager::create($d);
		$bodyMsg = sprintf("Dziękujemy za kontakt %s %s. Postaramy się jak najszybciej odpowiedzieć, rozmowy prowadzone z nami jak i odpowiedzi wysyłaj proszę z <a href='%s/user.php?key=%s'>tego</a> miejsca. <b>Proszę, link ten umożliwia automatycznie przeglądanie wszystkich twoich rozmów z nami,  nie podawaj go NIKOMU</b>", $firstName, $lastName,$_SERVER['SERVER_NAME'], $p);
		MailSender::send($eMail, "Kontakt z pizzerią", $bodyMsg, sprintf("%s %s", $firstName, $lastName));
		
		$d = array(
			'title' => $topic,
			'owner' => $us->getID()
		);
		$room = ContactRoomManager::create($d);

		$d = array(
			'message' => $message,
			'author' => $us->getID(),
			'roomID' =>	$room->getID()
		);
		ContactMessageManager::create($d);
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}
echo json_encode($response);
?>