<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$data = isset($_POST['data']) ? ($_POST['data']) : null;
$response = array(
    'complete' => false,
    'allowed' => false,
);

if ($data != null) {
    try {
        if (LoginGuard::isAdmin()) {
            $error = NotificationManager::isValidData($data);
            if ($error == ErrorID::Notification_SendComplete) {
                $response['complete'] = NotificationManager::send($data['title'], $data['message']);
                $response['allowed'] = true;
                ErrorHandler::createFromTemplate(ErrorID::Notification_SendComplete);
            }
            ErrorHandler::createFromTemplate($error);
        }
    } catch (Exception $e) {
        $response['complete'] = false;
    }

}
echo json_encode($response);
