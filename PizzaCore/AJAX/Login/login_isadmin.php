<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$allowed = isset($_POST['allowed']) ? ($_POST['allowed']) : null;
$response = array(
    'allow' => false,
);
if ($allowed !== null) {
    try {
        if (LoginGuard::isAdmin()) {
            $response['allow'] = true;
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
echo json_encode($response);
