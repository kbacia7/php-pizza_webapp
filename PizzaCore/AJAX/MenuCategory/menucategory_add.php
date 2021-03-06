<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$title = isset($_POST['title']) ? ($_POST['title']) : null;
$response = array(
    'complete' => false,
    'allowed' => false,
    'object' => null,
);
if ($title != null) {

    try {
        if (LoginGuard::isAdmin()) {
            $response['allowed'] = true;
            $settings = array(
                'title' => $title,
            );
            $error = MenuCategoryManager::isValidData($settings);
            if ($error == -1) {
                $response['object'] = MenuCategoryManager::create($settings);
				$response['complete'] = true;
				ErrorHandler::createFromTemplate(ErrorID::MenuCategory_CreateComplete);
			}
			else
            	ErrorHandler::createFromTemplate($error);
        }
    } catch (Exception $e) {
        $response['complete'] = false;
    }
}
echo json_encode($response);
