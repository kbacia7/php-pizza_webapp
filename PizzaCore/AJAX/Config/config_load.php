<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$response = array(
    'complete' => false,
    'allowed' => false,
    'objects' => array(),
);

try {
    $response['allowed'] = true;
    $config = ConfigManager::load(null);
    $response['complete'] = true;
    $response['objects'] = ($config);
} catch (Exception $e) {
    $response['complete'] = false;
}
echo json_encode($response);
