<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$data = isset($_POST['data']) ? ($_POST['data']) : null;
$response = array(
	'complete' => false,
	'allowed' => false
);

if($data != null)
{
	try {	
		if(LoginGuard::isAdmin())
		{	
			$error = NotificationManager::isValidData($data);
			if($error == ErrorTemplatesId::Notification_SendSuccess) {
				$response['complete'] = NotificationManager::send($data['title'], $data['message']);
				$response['allowed'] = true;	
				ErrorHandler::createFromTemplate(ErrorTemplatesId::Notification_SendSuccess);
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