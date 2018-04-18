<?php
class ConfigManager implements IEntityManager {
	private static $tableName = "config";
	
	//Interfaces methods
	public static function create($options) {
		$queryBuild = new QueryBuilder();
		$functionManager = new FunctionManager();
		$queryBuild->insert(self::$tableName, $options);
		$configEntity = new Config();
		foreach($options as $k => $v)
			$functionManager->excetuteBasicMethod($configEntity, "set", $k, $v);
		$functionManager->excetuteBasicMethod($configEntity, "set", "ID", $queryBuild->getLastID());
		return $configEntity;
	}
	
	public static function remove($row) {
		$queryBuild = new QueryBuilder();
		return $queryBuild->remove(self::$tableName, $row);
	}

	public static function load($data) {
		$queryBuild = new QueryBuilder();
		$config =null;
		$functionManager = new FunctionManager();		
		$q = $queryBuild->customQuery(sprintf("SELECT * FROM %s LIMIT 1", self::$tableName));
		while($rowConfig = $q->fetch(PDO::FETCH_ASSOC))
		{
			$configObject = new Config();
			foreach($rowConfig as $col => $colValue)
			{
				$functionManager->excetuteBasicMethod($configObject, "set", $col, $colValue);
			}
			$config = $configObject;
		}
		return $config;
	}

	public static function update($data, $id)
	{
		$queryBuild = new QueryBuilder();
		$functionManager = new FunctionManager();
		$queryBuild->update(self::$tableName, $data, array("ID" => $id));
		return true;
	}

	public static function isValidData($data) 
	{
		if($data == null)
			return (ErrorTemplatesId::MenuCategory_NoData);
		else if(strlen($data['title']) <= 0)
			return (ErrorTemplatesId::Config_PizzeriaNull);
		else if(strlen($data['title']) > 30)
			return (ErrorTemplatesId::Config_PizzeriaTooLong);
		else if(strlen($data['position']) <= 0)
			return (ErrorTemplatesId::Config_PizzeriaLocationEmpty);
		else if(!preg_match("/^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/", $data['position']))
			return (ErrorTemplatesId::Config_PizzeriaLocationFormat);
		else if(strlen($data['contactNumber']) <= 0)
			return (ErrorTemplatesId::Config_TelephoneEmpty);
		else if(!preg_match("/^\(\d{2}\)\ ?\d{3}-?\d{3}-?\d{3}$/", $data['contactNumber']))
			return (ErrorTemplatesId::Config_TelephoneFormat);
		else if(strlen($data['cashChar']) <= 0)
			return (ErrorTemplatesId::Config_CurrencyEmpty);
		else if(strlen($data['cashChar']) > 3)
			return (ErrorTemplatesId::Config_CurrencyTooLong);
		else if(strlen($data['descriptionGallery1']) <= 0)
			return (ErrorTemplatesId::Config_GalleryOneEmpty);
		else if(strlen($data['descriptionGallery2']) <= 0)
			return (ErrorTemplatesId::Config_GalleryTwoEmpty);
		return ErrorTemplatesId::Config_UpdateSuccess;
	}
}
?>