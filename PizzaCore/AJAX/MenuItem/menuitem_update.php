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
		ErrorHandler::createFromTemplate(ErrorID::MenuItem_InvalidTitle);
	if(!preg_match("/^(\d{1,3})?(,?\d{3})*(\.\d{2})?$/", $data['price']))
		ErrorHandler::createFromTemplate(ErrorID::MenuItem_InvalidPrice);
	else 
	{
		try {	
			if(LoginGuard::isAdmin())
			{	
				$response['complete'] = MenuItemManager::update($data, $ID);
				$response['allowed'] = true;
				ErrorHandler::createFromTemplate(ErrorID::MenuItem_UpdateComplete);	
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
	}
}
else if($ID == null)
	ErrorHandler::createFromTemplate(ErrorID::MenuItem_DoesntExists);
else 
	ErrorHandler::createFromTemplate(ErrorID::MenuItem_EmptyData);
echo json_encode($response);
?>