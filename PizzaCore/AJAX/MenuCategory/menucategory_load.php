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
		$loadedMenuCategory = MenuCategoryManager::load(($ID !== "*") ? $ID : null);
		$response['complete'] = true;	
		$response['objects'] = ($loadedMenuCategory);
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
else
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_NoExists);
echo json_encode($response);
?>