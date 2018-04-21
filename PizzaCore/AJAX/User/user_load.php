<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$ID = isset($_POST['ID']) ? ($_POST['ID']) : null;
$response = array(
	'complete' => false,
	'allowed' => false,
	'objects' => array()
);
if($ID != null)
{
	try {	
		$response['allowed'] = true;
		$loadedUsers = UserManager::load(($ID !== "*") ? $ID : null);
		$response['complete'] = true;	
		$response['objects'] = ($loadedUsers);
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
else 
	ErrorHandler::createFromTemplate(ErrorID::MenuItem_DoesntExists);
echo json_encode($response);
?>