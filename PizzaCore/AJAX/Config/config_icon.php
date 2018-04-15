<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$response = array(
	'complete' => false,
	'allowed' => false
);

try {	
	if(LoginGuard::isAdmin())
	{
		$response['allowed'] = true;
		$iconPath = $_SERVER['DOCUMENT_ROOT'] . '/images/pizzaicon.png';
		unlink($iconPath);
		move_uploaded_file($_FILES['file']['tmp_name'], $iconPath);
		$response['complete'] = true;	
	}
}
catch(Exception $e) {
	$response['complete'] = false;
}
echo json_encode($response);
?>