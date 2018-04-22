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
            if ($data["password"] == null) {
                unset($data["password"]);
            }

            $d = array(
                'login' => $data['login'],
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'password' => array_key_exists("password", $data) ? ($data["password"]) : ("1234567"),
                'admin' => $data['admin'],
            );

            $error = UserManager::isValidData($d);
            if ($error == ErrorID::User_CreateComplete) {
                $response['complete'] = UserManager::update($data, $ID);
                $response['allowed'] = true;
                ErrorHandler::createFromTemplate($error);
            }
            ErrorHandler::createFromTemplate($error);

        }
    } catch (Exception $e) {
        $response['complete'] = false;
    }
}
echo json_encode($response);
