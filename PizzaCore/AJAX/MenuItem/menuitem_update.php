<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$ID = isset($_POST['ID']) ? ($_POST['ID']) : null;
$data = isset($_POST['data']) ? ($_POST['data']) : null;
$response = array(
	'complete' => false,
	'allowed' => false
);

if($ID != null && $data != null)
{
	try {	
		if($_SESSION['userID'] !== null)
		{	
			$response['complete'] = MenuItemManager::update($data, $ID);
			$response['allowed'] = true;	
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
else if($ID == null)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoExists);
else 
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoData);
echo json_encode($response);
?>