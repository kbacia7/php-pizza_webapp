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
if($description != null)
{
		try {	
			if($_SESSION['userID'] !== null)
			{
				$response['allowed'] = true;
				$settings = array(
					'path' => $path,
					'description' => $description,
					'galleryID' => $gID
				);
				$response['object'] = GalleryManager::create($settings);
				$response['complete'] = true;	
			}
		}
		catch(Exception $e) {
			$response['complete'] = false;
		}
}
echo json_encode($response);
?>