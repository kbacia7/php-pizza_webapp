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
		if($_SESSION['userID'] !== null)
		{
			$response['allowed'] = true;
			$loadedMenuItem = MenuItemManager::load(($ID !== "*") ? $ID : null);
			$response['complete'] = true;	
			$response['objects'] = ($loadedMenuItem);
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
}
echo json_encode($response);
?>