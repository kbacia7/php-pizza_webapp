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
			$response['complete'] = MenuCategoryManager::remove(array("ID" => $ID));
			$response['allowed'] = true;
			ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_RemoveSuccess);
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
else
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_NoExists);
echo json_encode($response);
?>