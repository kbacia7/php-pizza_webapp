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
			$response['complete'] = ConfigManager::update($data, 1);
			$response['allowed'] = true;	
			ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_UpdateSuccess);
		}
	}
	catch(Exception $e) {
		$response['complete'] = false;
	}
	
}
else if($data == null)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::MenuCategory_NoData);
else if($data['title'].length <= 0)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_PizzeriaNull);
else if($data['title'].length > 30)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_PizzeriaTooLong);
else if($data['position'].length <= 0)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_PizzeriaLocationEmpty);
else if(!preg_match("/^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/", $data['position']))
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_PizzeriaLocationFormat);
else if($data['contactNumber'].length <= 0)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_TelephoneEmpty);
else if(!preg_match("/^\(\d{2}\)\ ?\d{3}-?\d{3}-?\d{3}$/", $data['contactNumber']))
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_TelephoneFormat);
else if($data['cashChar'].length <= 0)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_CurrencyEmpty);
else if($data['cashChar'].length > 3)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_CurrencyTooLong);
else if($data['descriptionGallery1'].length <= 0)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_GalleryOneEmpty);
else if($data['descriptionGallery2'].length <= 0)
	ErrorHandler::createFromTemplate(ErrorTemplatesId::Config_GalleryTwoEmpty);
echo json_encode($response);
?>