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
}
?>