<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$title = isset($_POST['title']) ? ($_POST['title']) : null;
$price = isset($_POST['price']) ? ($_POST['price']) : null;
$parent = isset($_POST['parent']) ? ($_POST['parent']) : null;
$response = array(
    'complete' => false,
    'allowed' => false,
    'object' => null,
);

if ($title != null && $price != null && $parent != null) {

    try {
        if (LoginGuard::isAdmin()) {
            $response['allowed'] = true;
            $settings = array(
                'title' => $title,
                'price' => $price,
                'parent' => $parent,
            );
            $error = MenuItemManager::isValidData($settings);
            if ($error == -1) {
                $response['object'] = MenuItemManager::create($settings);
                $response['complete'] = true;
                ErrorHandler::createFromTemplate(ErrorID::MenuItem_CreateComplete);
			}
			else
            	ErrorHandler::createFromTemplate($error);
        }
    } catch (Exception $e) {
        $response['complete'] = false;
    }
}

echo json_encode($response);
