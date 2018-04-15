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
	if(!preg_match("/^[\\p{L},' ']+$/", $data['title']))
		ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoValidTitle);
	if(!preg_match("/^(\d{1,3})?(,?\d{3})*(\.\d{2})?$/", $data['price']))
		ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoValidPrice);
	else 
	{
		try {	
			if($_SESSION['userID'] !== null && array_key_exists("admin", $_SESSION))
			{	
				$response['complete'] = MenuItemManager::update($data, $ID);
				$response['allowed'] = true;
				ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_UpdateSuccess);	
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
	}
}
else if($ID == null)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoExists);
else 
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoData);
echo json_encode($response);
?>