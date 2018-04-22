<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$ID = isset($_POST['ID']) ? ($_POST['ID']) : null;
$data = isset($_POST['data']) ? ($_POST['data']) : null;
$response = array(
    'complete' => false,
    'allowed' => false,
);

if ($ID != null && $data != null) {

    try {
        if (LoginGuard::isAdmin()) {
            $d = array(
                'title' => $data['title'],
                'price' => $data['price'],
                'ID' => $ID,
            );
            $error = MenuItemManager::isValidData($d);
            if ($error == ErrorID::MenuItem_CreateComplete) {
                $response['complete'] = MenuItemManager::update($data, $ID);
                $response['allowed'] = true;
                ErrorHandler::createFromTemplate(ErrorID::MenuItem_UpdateComplete);
            }
            ErrorHandler::createFromTemplate($error);
        }
    } catch (Exception $e) {
        $response['complete'] = false;
    }
}
echo json_encode($response);
