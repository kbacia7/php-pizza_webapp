<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$title = isset($_POST['title']) ? ($_POST['title']) : null;
$authorEmail = isset($_POST['email']) ? ($_POST['email']) : null;

$response = array(
	'complete' => false,
	'allowed' => false,
	'object' => null
);
if($title != null)
{
		try {	
			if(LoginGuard::isUser())
			{
				$response['allowed'] = true;
				$settings = array(
					'title' => $title,
					'email' => $authorEmail
				);
				$response['object'] = ContactRoomManager::create($settings);
				$response['complete'] = true;	
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
}
echo json_encode($response);
?>