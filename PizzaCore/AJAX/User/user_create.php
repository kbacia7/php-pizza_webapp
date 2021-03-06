<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_(true);

$firstName = isset($_POST['firstName']) ? ($_POST['firstName']) : null;
$lastName = isset($_POST['lastName']) ? ($_POST['lastName']) : null;
$login = isset($_POST['login']) ? ($_POST['login']) : null;
$p = isset($_POST['password']) ? ($_POST['password']) : null;
$isAdmin = isset($_POST['admin']) ? ($_POST['admin']) : null;
$response = array(
	'complete' => false,
	'object' => null
);
if($firstName != null && $lastName != null && $login != null && $p != null && $isAdmin != null)
{
	try {
		if(LoginGuard::isAdmin()) {
			$d = array(
				'login' => $login,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'password' => $p,
				'admin' => $isAdmin
			);
			$error = UserManager::isValidData($d);
			if($error == -1)
			{
				$response['object'] = UserManager::create($d);
				$response['complete'] = true;
				ErrorHandler::createFromTemplate(ErrorID::User_CreateComplete);
			}
			else
				ErrorHandler::createFromTemplate($error);
		}
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}
echo json_encode($response);
?>