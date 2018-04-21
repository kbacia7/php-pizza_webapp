<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$ID = isset($_POST['ID']) ? ($_POST['ID']) : null;
$response = array(
	'complete' => false,
	'allowed' => false
);

if($ID != null)
{
	try {	
		if(LoginGuard::isAdmin())
		{	
			$response['complete'] = MenuItemManager::remove(array("ID" => $ID));
			$response['allowed'] = true;
			ErrorHandler::createFromTemplate(ErrorID::MenuItem_RemoveComplete);	
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
else 
	ErrorHandler::createFromTemplate(ErrorID::MenuItem_DoesntExists); 
echo json_encode($response);
?>