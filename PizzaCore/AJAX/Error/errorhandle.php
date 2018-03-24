<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();
session_start();


$response = array(
	'errors' => null
);

$response['errors'] = ErrorHandler::load();

echo json_encode($response);
?>