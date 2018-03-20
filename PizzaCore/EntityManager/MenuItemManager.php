<?php
class MenuItemManager implements IEntityManager {
	private static $tableName = "menu_item";
	
	//Interfaces methods
	public static function create($options) {
		$queryBuild = new QueryBuilder();
		$functionManager = new FunctionManager();
		$queryBuild->insert(self::$tableName, $options);
		$newMenu = new MenuItem();
		foreach($options as $k => $v)
			$functionManager->excetuteBasicMethod($newMenu, "set", $k, $v);
		return $newMenu;
	}
	
	public static function remove($row) {
		$queryBuild = new QueryBuilder();
		return $queryBuild->remove(self::$tableName, $row);
	}

	public static function load($data) {
		$queryBuild = new QueryBuilder();
		$menuArray = array();
		$functionManager = new FunctionManager();
		
		$q = null;
		if($data !== null)
			$q = $queryBuild->select(self::$tableName, array("*"), $data);
		else 
			$q = $queryBuild->select(self::$tableName, array("*"));
		while($rowMenu = $q->fetch(PDO::FETCH_ASSOC))
		{
			$menuObject = new MenuItem();
			foreach($rowMenu as $col => $colValue)
			{
				$functionManager->excetuteBasicMethod($menuObject, "set", $col, $colValue);
			}
			$menuArray[] = $menuObject;
		}
		return $menuArray;
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