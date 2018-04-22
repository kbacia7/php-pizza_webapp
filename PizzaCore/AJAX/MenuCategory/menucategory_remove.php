<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$ID = isset($_POST['ID']) ? ($_POST['ID']) : null;
$response = array(
    'complete' => false,
    'allowed' => false,
);

if ($ID != null) {
    try {
        if (LoginGuard::isAdmin()) {
            $d = array(
                "ID" => $ID,
            );
            $error = MenuCategoryManager::isValidData($d);
            if ($error == -1) {
                $response['complete'] = MenuCategoryManager::remove(array("ID" => $ID));
				$response['allowed'] = true;
				ErrorHandler::createFromTemplate(ErrorID::MenuCategory_RemoveComplete);
            }
            ErrorHandler::createFromTemplate($error);
        }
    } catch (Exception $e) {
        $response['complete'] = false;
    }
}
echo json_encode($response);
