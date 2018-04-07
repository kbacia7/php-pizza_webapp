<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php');
RequirePath::include_();

$response = array(
	'complete' => false,
	'allowed' => false,
	'filename' => ""
);

try {	
	if($_SESSION['userID'] !== null)
	{
		$response['allowed'] = true;
		$dArray = array("4k+" => 1186, "FullHD2K" => 735, "laptops" => 500, "NormalPC" => 669, "smartphone" => 212, "tablets" => 390);
		$filePath = $_SERVER['DOCUMENT_ROOT'] . '/images/';
		$newFileName = hash("sha256", time());
	//	unlink($iconPath);
		$e = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		$newPath = sprintf("%s%s.%s", $filePath, $newFileName, $e);
		move_uploaded_file($_FILES['file']['tmp_name'], $newPath);
		foreach($dArray as $k => $v)
		{
			$copyTo = sprintf("%s/%s/gallery1/%s.%s", $filePath, $k, $newFileName ,$e);
			//copy($newPath, $copyTo);
			$imgRes = call_user_func(sprintf("imagecreatefrom%s", $e), $newPath);
			imagescale($imgRes, $v);
			call_user_func(sprintf("image%s", $e), $imgRes, $copyTo);
		}
		unlink($newPath);
		$response['filename'] = sprintf("%s.%s", $newFileName, $e);
		$response['complete'] = true;	
	}
}
catch(Exception $e) {
	$response['complete'] = false;
}
echo json_encode($response);
?>