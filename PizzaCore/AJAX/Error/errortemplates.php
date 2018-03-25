<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();
session_start();


$response = array(
	'templates' => null
);

$response['templates'] = ErrorTemplates::$templates;

echo json_encode($response);
?>