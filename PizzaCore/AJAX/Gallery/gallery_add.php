<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$path = isset($_POST['path']) ? ($_POST['path']) : null;
$description = isset($_POST['description']) ? ($_POST['description']) : null;
$gID = isset($_POST['galleryID']) ? ($_POST['galleryID']) : null;
$response = array(
	'complete' => false,
	'allowed' => false,
	'object' => null
);
if($description != null && $path != null && $gID != null)
{
		try {	
			if(LoginGuard::isAdmin())
			{
				$settings = array(
					'path' => $path,
					'description' => $description,
					'galleryID' => $gID
				);
				$error = GalleryManager::isValidData($settings);
				if($error == ErrorTemplatesId::Gallery_ImageUploaded) {
					$response['allowed'] = true;				
					$response['object'] = GalleryManager::create($settings);
					$response['complete'] = true;	
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