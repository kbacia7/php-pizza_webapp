<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$ID = isset($_POST['ID']) ? ($_POST['ID']) : null;
$data = isset($_POST['data']) ? ($_POST['data']) : null;
$response = array(
	'complete' => false,
	'allowed' => false
);

if($ID != null && $data != null)
{

	try {	
			if(LoginGuard::isAdmin())
			{	
				$d = array(
					"ID" => $ID,
					"title" => $data["title"]
				);
				$error = MenuCategoryManager::isValidData($d);
				if($error == ErrorID::MenuCategory_UpdateComplete)
				{
					$response['complete'] = MenuCategoryManager::update($data, $ID);
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