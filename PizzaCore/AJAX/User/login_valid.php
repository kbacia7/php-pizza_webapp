<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$login = isset($_POST['login']) ? ($_POST['login']) : null;
$password = isset($_POST['password']) ? ($_POST['password']) : null;
$response = array(
	'complete' => false
);
if($login != null && $password != null)
{
	try {
		$userLoaded = UserManager::isCorrectPassword($password, $login);
		if($userLoaded != null) 
		{
			$user = array_values($userLoaded)[0];
			if($user->getAdmin())
			{
				$response['complete'] = true;
				$user = array_values($userLoaded)[0];
				$_SESSION['userID'] = $user->getID();
			}
			else
				$response['complete'] = false;
		}
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}
echo json_encode($response);
?>