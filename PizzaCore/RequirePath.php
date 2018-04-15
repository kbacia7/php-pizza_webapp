<?php
class RequirePath {
	public static function include_($mail = false)
	{
		define('__ROOT__', $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/'); 

		require_once(__ROOT__ . "Entity/Config.php");
		require_once(__ROOT__ . "Entity/User.php");
		require_once(__ROOT__ . "Entity/ContactMessage.php");
		require_once(__ROOT__ . "Entity/ContactRoom.php");
		require_once(__ROOT__ . "Entity/MenuCategory.php");
		require_once(__ROOT__ . "Entity/MenuItem.php");
		require_once(__ROOT__ . "Entity/GalleryItem.php");
		require_once(__ROOT__ . "Error/ErrorMessage.php");
		
		
		require_once(__ROOT__ . "Utility/PizzaException.php");
	
		require_once(__ROOT__ . "Utility/FunctionManager.php");
		require_once(__ROOT__ . "Config/ConfigLoader.php");
		require_once(__ROOT__ . "Database/DB.php");
		require_once(__ROOT__ . "Database/QueryBuilder.php");

		require_once(__ROOT__ . "EntityManager/IEntityManager.php");
		require_once(__ROOT__ . "EntityManager/MenuItemManager.php");
		require_once(__ROOT__ . "EntityManager/MenuCategoryManager.php");
		require_once(__ROOT__ . "EntityManager/UserManager.php");
		require_once(__ROOT__ . "EntityManager/GalleryManager.php");
		require_once(__ROOT__ . "EntityManager/ContactRoomManager.php");
		require_once(__ROOT__ . "EntityManager/ContactMessageManager.php");
		require_once(__ROOT__ . "EntityManager/ConfigManager.php");

		require_once(__ROOT__ . "Error/ErrorTypes.php");
		require_once(__ROOT__ . "Error/ErrorHandler.php");
		require_once(__ROOT__ . "Error/ErrorTemplatesId.php");
		require_once(__ROOT__ . "Error/ErrorTemplates.php");

		require_once(__ROOT__ . "Notification/NotificationManager.php");

		require_once(__ROOT__ . "Utility/LoginGuard.php");
		require_once(__ROOT__ . "Utility/RandomString.php");

		if($mail)
		{
			require_once(__ROOT__ . 'PHPMailer/Exception.php');
			require_once(__ROOT__ . 'PHPMailer/PHPMailer.php');
			require_once(__ROOT__ . 'PHPMailer/SMTP.php');	
			require_once(__ROOT__ . 'Mail/MailSender.php');
		}

		ErrorHandler::createErrorsModels();
	}

	public static function ConfigPath()
	{
		return $_SERVER['DOCUMENT_ROOT'] . '/PizzaConfig/config.yaml';
	}
}
?>