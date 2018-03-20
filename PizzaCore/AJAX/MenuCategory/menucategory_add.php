<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$title = isset($_POST['title']) ? ($_POST['title']) : null;
$response = array(
	'complete' => false,
	'allowed' => false
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
			$menu_category = MenuCategoryManager::create($settings);
			$response['complete'] = true;	
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
echo json_encode($response);
?>