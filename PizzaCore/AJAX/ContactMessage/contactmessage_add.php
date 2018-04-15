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
			if($_SESSION['userID'] !== null)
			{
				$response['allowed'] = true;
				$settings = array(
					'message' => $msg,
					'author' => $_SESSION['userID'],
					'roomID' => $roomID
				);
				$response['object'] = ContactMessageManager::create($settings);
				$response['complete'] = true;	
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
}
echo json_encode($response);
?>