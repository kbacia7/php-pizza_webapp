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
	try {	
		if($_SESSION['userID'] !== null)
		{
			$response['allowed'] = true;
			$settings = array(
				'title' => $title
			);
			$response['object'] = MenuCategoryManager::create($settings);
			$response['complete'] = true;	
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
else
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategoryCreate_NoTitle);
echo json_encode($response);
?>