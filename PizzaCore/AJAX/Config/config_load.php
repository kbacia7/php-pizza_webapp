<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$response = array(
    'complete' => false,
    'allowed' => false,
	'objects' => array(),
	'appID' => "",
	'mapKey' => ""
);

try {
    $response['allowed'] = true;
    $config = ConfigManager::load(null);
	$response['complete'] = true;
	$response['objects'] = ($config);
	$configL = new ConfigLoader();
	$cData = $configL->GetConfig();
	$response['appID'] = $cData['oneSignalAppID'];
	$response['mapKey'] = $cData['googleMapAPIKey'];
} catch (Exception $e) {
    $response['complete'] = false;
}
echo json_encode($response);
