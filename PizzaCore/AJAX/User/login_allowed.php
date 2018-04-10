<?php	
session_start();
$allowed = isset($_POST['allowed']) ? ($_POST['allowed']) : null;
$response = array(
	'allow' => false
);
if($allowed !== null)
{
	try {	
		if($_SESSION['userID'] != null && $_SESSION['admin'])
			$response['allow'] = true;
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}
echo json_encode($response);
?>