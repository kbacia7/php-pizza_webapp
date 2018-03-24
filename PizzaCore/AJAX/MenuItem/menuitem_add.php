<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$title = isset($_POST['title']) ? ($_POST['title']) : null;
$price = isset($_POST['price']) ? ($_POST['price']) : null;
$parent = isset($_POST['parent']) ? ($_POST['parent']) : null;
$response = array(
	'complete' => false,
	'allowed' => false,
	'object' => null
);

if($title != null && $price != null && $parent != null)
{
	try {	
		if($_SESSION['userID'] !== null)
		{
			$response['allowed'] = true;
			$settings = array(
				'title' => $title,
				'price' => $price,
				'parent' => $parent
			);
			$response['object'] = MenuItemManager::create($settings);
			$response['complete'] = true;	
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
else if($title == null)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoTitle);
else if($price == null)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoPrice);
else 
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoParent);
echo json_encode($response);
?>