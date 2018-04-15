<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$response = array(
	'complete' => false,
	'allowed' => false,
	'key' => ""
);

try {	
	$response['allowed'] = true;
	$config = new ConfigLoader();
	$data = $config->GetConfig();
	$response['complete'] = true;	
	$response['key'] = $data["googleRESiteKey"];
}
catch(Exception $e) {
	$response['complete'] = false;
}
echo json_encode($response);
?>