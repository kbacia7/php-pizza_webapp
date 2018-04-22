<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_(true);

$firstName = isset($_POST['firstName']) ? ($_POST['firstName']) : null;
$lastName = isset($_POST['lastName']) ? ($_POST['lastName']) : null;
$eMail = isset($_POST['eMail']) ? ($_POST['eMail']) : null;
$topic = isset($_POST['topic']) ? ($_POST['topic']) : null;
$message = isset($_POST['message']) ? ($_POST['message']) : null;
$captcha = isset($_POST['captcharesponse']) ? ($_POST['captcharesponse']) : null;
$response = array(
    'complete' => false,
);
$validated = false;
if ($firstName != null && $lastName != null && $eMail != null && $topic != null && $message != null
    && $captcha != null) {
    try {
        $validated = CaptchaValidator::validate($captcha);
        $c = true;
        if ($validated) {
            $config = new ConfigLoader();
            $cData = $config->GetConfig();
            $userExists = UserManager::load(array("login" => $eMail));
            $us = null;
            $bodyMsg = "";
            $r = new RandomString();
            $p = $r->Random(30);
            $d = array(
                'login' => $eMail,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'password' => $p,
                'admin' => 0,
            );
            $error = UserManager::isValidData($d);
            if ($error == -1) {
                if ($userExists == null) {
                    $us = UserManager::create($d);
                    $sKey = base64_encode(sprintf("%s|%s", $p, $eMail));
                    $eContent = sprintf($cData['firstEmailRegisterContent'], $firstName, $lastName, $_SERVER['SERVER_NAME'], $sKey);

                    $bodyMsg = sprintf("<html><head><meta charset='utf=8'/></head><body>%s</body></html>", $eContent);
                    MailSender::send($eMail, "Kontakt z pizzerią", $bodyMsg, sprintf("%s %s", $firstName, $lastName));
                } else {
                    $us = $userExists[0];
                    $eContent = sprintf($cData['nextEmailContent'], $firstName, $lastName);

                    $bodyMsg = sprintf("<html><head><meta charset='utf=8'/></head><body>%s</body></html>", $eContent);
                    MailSender::send($eMail, "Kontakt z pizzerią", $bodyMsg, sprintf("%s %s", $firstName, $lastName));
                }
            } else {
                $c = false;
            }

            $d = array(
                'title' => $topic,
                'owner' => $us->getID(),
            );
            $error = ContactRoomManager::isValidData($d);
            if ($error == -1) {
                $room = ContactRoomManager::create($d);
            } else {
                $c = false;
            }

            $d = array(
                'message' => $message,
                'author' => $us->getID(),
                'roomID' => $room->getID(),
            );
            $error = ContactMessageManager::isValidData($d);
            if ($error == -1) {
                ContactMessageManager::create($d);
            } else {
                $c = false;
            }

            $response['complete'] = $c;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
echo json_encode($response);
