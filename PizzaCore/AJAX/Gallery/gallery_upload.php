<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$response = array(
	'complete' => false,
	'allowed' => false
);

try {	
	if($_SESSION['userID'] !== null)
	{
		$response['allowed'] = true;
		//TODO: Copy, scale, save files
		$response['complete'] = true;	
	}
}
catch(Exception $e) {
	$response['complete'] = false;
}
echo json_encode($response);
?>