<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$login = isset($_POST['login']) ? ($_POST['login']) : null;
$password = isset($_POST['password']) ? ($_POST['password']) : null;
$response = array(
	'complete' => false,
	'admin' => false
);
if($login != null && $password != null)
{
	try {
		$userLoaded = UserManager::isCorrectPassword($password, $login);
		if($userLoaded != null) 
		{
			$response['complete'] = true;
			$user = array_values($userLoaded)[0];
			$_SESSION['userID'] = $user->getID();
			if($user->getAdmin())
				$_SESSION['admin'] = true;		
			else
				$_SESSION['admin'] = false;
			$response['admin'] = $_SESSION["admin"];
		}
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}
echo json_encode($response);
?>