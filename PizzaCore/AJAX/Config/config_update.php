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
		if($_SESSION['userID'] !== null && array_key_exists("admin", $_SESSION))
		{	
			$response['complete'] = ConfigManager::update($data, 1);
			$response['allowed'] = true;	
			ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_UpdateSuccess);
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
	
}
//else 
//	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_NoData);
echo json_encode($response);
?>