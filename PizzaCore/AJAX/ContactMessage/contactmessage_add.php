<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$msg = isset($_POST['message']) ? ($_POST['message']) : null;
$roomID = isset($_POST['room']) ? ($_POST['room']) : null;

$response = array(
	'complete' => false,
	'allowed' => false,
	'object' => null
);
if($msg != null)
{
		try {	
			if(LoginGuard::isUser())
			{
				$response['allowed'] = true;
				$settings = array(
					'message' => $msg,
					'author' => $_SESSION['userID'],
					'roomID' => $roomID
				);
				$error = ContactMessageManager::isValidData($settings);
				if($error == ErrorTemplatesId::ContactMessage_CreateSuccess) {
					$response['object'] = ContactMessageManager::create($settings);
					$response['complete'] = true;	
					ErrorHandler::createFromTemplate($error);
				}
				ErrorHandler::createFromTemplate($error);
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
}
echo json_encode($response);
?>