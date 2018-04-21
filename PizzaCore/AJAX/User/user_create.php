<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_(true);

$firstName = isset($_POST['firstName']) ? ($_POST['firstName']) : null;
$lastName = isset($_POST['lastName']) ? ($_POST['lastName']) : null;
$eMail = isset($_POST['eMail']) ? ($_POST['eMail']) : null;
$topic = isset($_POST['topic']) ? ($_POST['topic']) : null;
$message = isset($_POST['message']) ? ($_POST['message']) : null;
$captcha = isset($_POST['captcharesponse']) ? ($_POST['captcharesponse']) : null;
$response = array(
	'complete' => false
);
$validated = false;
if($firstName != null && $lastName != null && $eMail != null && $topic != null && $message != null 
	&& $captcha != null)
{
	try {
		$validated = CaptchaValidator::validate($captcha);
		$c = true;
		if($validated) {
			$userExists = UserManager::load(array("login" => $eMail));
			$us = null;
			$bodyMsg = "";
				$r = new RandomString();
				$p = $r->Random(30);
				$d = array(
					'login' => $eMail,
					'firstName' => $firstName,
					'lastName' => $lastName,
					'password' => $p,
					'admin' => false
				);
				$error = UserManager::isValidData($d);
				if($error == ErrorTemplatesId::User_CreateSuccess) {
					if($userExists == null)
					{
						$us = UserManager::create($d);
						$sKey = base64_encode(sprintf("%s|%s", $p, $eMail));
						$bodyMsg = sprintf("<html><head><meta charset='utf=8'/></head><body>Dziękujemy za kontakt %s %s. Postaramy się jak najszybciej odpowiedzieć, rozmowy prowadzone z nami jak i odpowiedzi wysyłaj proszę z <a href='%s/user.php?key=%s'>tego</a> miejsca. <b>Proszę, link ten umożliwia automatycznie przeglądanie wszystkich twoich rozmów z nami,  nie podawaj go NIKOMU</b></body></html>", $firstName, $lastName,$_SERVER['SERVER_NAME'], $sKey);
						MailSender::send($eMail, "Kontakt z pizzerią", $bodyMsg, sprintf("%s %s", $firstName, $lastName));
					}
					else 
					{
						$us = $userExists[0];
						$bodyMsg = sprintf("<html><head><meta charset='utf=8'/></head><body>Dziękujemy za kontakt %s %s. Postaramy się jak najszybciej odpowiedzieć, rozmowy prowadzone z nami jak i odpowiedzi wysyłaj proszę ze specjalnego linka który otrzymałeś za pierwszym razem.</body></html>", $firstName, $lastName);
						MailSender::send($eMail, "Kontakt z pizzerią", $bodyMsg, sprintf("%s %s", $firstName, $lastName));
					}
				}
				else
					$c = true;
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
				$response['complete'] = $c;
		}
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}
echo json_encode($response);
?>