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
	if(!preg_match("/^[\\p{L},' ']+$/", $title))
		ErrorHandler::createFromTemplate(ErrorID::MenuItem_InvalidTitle);
	if(!preg_match("/^(\d{1,3})?(,?\d{3})*(\.\d{2})?$/", $price))
		ErrorHandler::createFromTemplate(ErrorID::MenuItem_InvalidPrice);
	else 
	{
		try {	
			if(LoginGuard::isAdmin())
			{
				$response['allowed'] = true;
				$settings = array(
					'title' => $title,
					'price' => $price,
					'parent' => $parent
				);
				$response['object'] = MenuItemManager::create($settings);
				$response['complete'] = true;	
				ErrorHandler::createFromTemplate(ErrorID::MenuItem_CreateComplete);
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
	}
}
else if($title == null)
	ErrorHandler::createFromTemplate(ErrorID::MenuItem_EmptyTitle);
else if($price == null)
	ErrorHandler::createFromTemplate(ErrorID::MenuItem_NoPrice);
else 
	ErrorHandler::createFromTemplate(ErrorID::MenuItem_NoParent);
echo json_encode($response);
?>