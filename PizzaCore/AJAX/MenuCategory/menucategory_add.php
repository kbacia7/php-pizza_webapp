<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$title = isset($_POST['title']) ? ($_POST['title']) : null;
$response = array(
	'complete' => false,
	'allowed' => false,
	'object' => null
);
if($title != null)
{
	if(!preg_match("/^[\\p{L},' ']+$/", $title))
		ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuItem_NoValidTitle);
	else 
	{
		try {	
			if($_SESSION['userID'] !== null && array_key_exists("admin", $_SESSION))
			{
				$response['allowed'] = true;
				$settings = array(
					'title' => $title
				);
				$response['object'] = MenuCategoryManager::create($settings);
				$response['complete'] = true;	
				ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_CreateSuccess);
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
	}
}
else
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategoryCreate_NoTitle);
echo json_encode($response);
?>