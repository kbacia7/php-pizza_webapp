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
	else
	{
		try {	
			if($_SESSION['userID'] !== null)
			{	
				$response['complete'] = MenuCategoryManager::update($data, $ID);
				$response['allowed'] = true;	
				ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_UpdateSuccess);
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
	}
}
else if($ID == null)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_NoExists);
else 
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_NoData);
echo json_encode($response);
?>