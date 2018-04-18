<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$data = isset($_POST['data']) ? ($_POST['data']) : null;
$response = array(
	'complete' => false,
	'allowed' => false
);

if($data != null)
{
	try {	
		if(LoginGuard::isAdmin())
		{	
			$error = ConfigManager::isValidData($data);
			if($error == ErrorTemplatesId::Config_UpdateSuccess)
			{
				$response['complete'] = ConfigManager::update($data, 1);
				$response['allowed'] = true;	
			}
			ErrorHandler::createFromTemplate($error);
			
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
	
}
echo json_encode($response);
?>