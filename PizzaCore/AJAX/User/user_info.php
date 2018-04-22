<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_(true);

$ID = isset($_POST['ID']) ? ($_POST['ID']) : null;
$response = array(
    'complete' => false,
    'object' => null,
);
if ($ID != null) {
    try {
        if (LoginGuard::isUser()) {
            $response['complete'] = true;
            $response['object'] = UserManager::load(array("ID" => $ID))[0];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
echo json_encode($response);
