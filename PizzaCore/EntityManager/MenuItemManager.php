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
		$functionManager->excetuteBasicMethod($newMenu, "set", "ID", $queryBuild->getLastID());
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

	public static function isValidData($data) 
	{
		if($data == null)
			return ErrorID::MenuItem_EmptyData;
		else if(array_key_exists("ID", $data) && $data["ID"] == null)
			return ErrorID::MenuItem_DoesntExists;
		else if(!array_key_exists("price", $data) || strlen($data['price']) <= 0)
			return ErrorID::MenuItem_EmptyPrice;
		else if(!array_key_exists("title", $data) || strlen($data['title']) <= 0)
			return ErrorID::MenuItem_EmptyTitle;
		else if(array_key_exists("parent", $data) && strlen($data['parent']) <= 0)
			return ErrorID::MenuItem_EmptyParent;
		else if(array_key_exists("price", $data) && !preg_match("/^(\d{1,3})?(,?\d{3})*(\.\d{2})?$/", $data['price']))
			return ErrorID::MenuItem_InvalidPrice;
		else if(array_key_exists("title", $data) && !preg_match("/^[\\p{L},' ']+$/", $data['title']))
			return ErrorID::MenuItem_InvalidTitle;
		return ErrorID::MenuItem_CreateComplete;
	}
}
?>