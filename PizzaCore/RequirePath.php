<?php
class RequirePath {
	public static function include_()
	{
		define('__ROOT__', $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/'); 

		require_once(__ROOT__ . "Entity/User.php");
		require_once(__ROOT__ . "Entity/MenuCategory.php");
		require_once(__ROOT__ . "Entity/MenuItem.php");
		require_once(__ROOT__ . "Error/ErrorMessage.php");
		
		require_once(__ROOT__ . "PizzaException.php");
	
		require_once(__ROOT__ . "FunctionManager.php");
		require_once(__ROOT__ . "Config/ConfigLoader.php");
		require_once(__ROOT__ . "Database/DB.php");
		require_once(__ROOT__ . "Database/QueryBuilder.php");
		
		require_once(__ROOT__ . "EntityManager/IEntityManager.php");
		require_once(__ROOT__ . "EntityManager/MenuItemManager.php");
		require_once(__ROOT__ . "EntityManager/MenuCategoryManager.php");
		require_once(__ROOT__ . "EntityManager/UserManager.php");

		require_once(__ROOT__ . "Error/ErrorTypes.php");
		require_once(__ROOT__ . "Error/ErrorHandler.php");
		require_once(__ROOT__ . "Error/ErrorTemplatesId.php");
		require_once(__ROOT__ . "Error/ErrorTemplates.php");

		require_once(__ROOT__ . "Utility/RandomString.php");

		ErrorHandler::createErrorsModels();
	}

	public static function ConfigPath()
	{
		return __ROOT__ . "Config/config.json";
	}
}
?>