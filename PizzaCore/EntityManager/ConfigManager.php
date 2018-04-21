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
			return (ErrorID::MenuCategory_EmptyData);

		if(array_key_exists("title", $data)) {
			if(strlen($data['title']) <= 0)
				return (ErrorID::Config_EmptyPizzeriaName);
			else if(strlen($data['title']) > 30)
				return (ErrorID::Config_LongPizzeriaName);
		}

		if(array_key_exists("position", $data))
		{
			if(strlen($data['position']) <= 0)
				return (ErrorID::Config_EmptyPizzeriaLocation);
			else if(!preg_match("/^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/", $data['position']))
				return (ErrorID::Config_InvalidPizzeriaLocation);
		}

		if(array_key_exists("contactNumber", $data))
		{
			if(strlen($data['contactNumber']) <= 0)
				return (ErrorID::Config_EmptyTelephone);
			else if(!preg_match("/^\(\d{2}\)\ ?\d{3}-?\d{3}-?\d{3}$/", $data['contactNumber']))
				return (ErrorID::Config_InvalidTelephone);
		}

		if(array_key_exists("cashChar", $data))
		{
			if(strlen($data['cashChar']) <= 0)
				return (ErrorID::Config_EmptyCurrency);
			else if(strlen($data['cashChar']) > 3)
				return (ErrorID::Config_LongCurrency);
		}

		if(strlen($data['descriptionGallery1']) <= 0 && array_key_exists("descriptionGallery1", $data))
			return (ErrorID::Config_EmptyGalleryOne);
		else if(strlen($data['descriptionGallery2']) <= 0 && array_key_exists("descriptionGallery2", $data))
			return (ErrorID::Config_EmptyGalleryTwo);
		return ErrorID::Config_UpdateComplete;
	}
}
?>