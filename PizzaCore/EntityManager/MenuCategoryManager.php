<?php
class MenuCategoryManager implements IEntityManager {
	private static $tableName = "menu_category";
	
	//Interfaces methods
	public static function create($options) {
		$queryBuild = new QueryBuilder();
		$functionManager = new FunctionManager();
		$queryBuild->insert(self::$tableName, $options);
		$newMenu = new MenuCategory();
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
		$menuCategoryArray = array();
		$functionManager = new FunctionManager();
		
		$q = null;
		if($data !== null)
			$q = $queryBuild->select(self::$tableName, array("*"),$data);
		else 
			$q = $queryBuild->select(self::$tableName, array("*"));
		while($rowMenuCategory = $q->fetch(PDO::FETCH_ASSOC))
		{
			$menuCategoryObject = new MenuCategory();
			foreach($rowMenuCategory as $col => $colValue)
			{
				$functionManager->excetuteBasicMethod($menuCategoryObject, "set", $col, $colValue);
			}
			$menuCategoryArray[] = $menuCategoryObject;
		}
		return $menuCategoryArray;
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
			return ErrorTemplatesId::MenuCategory_NoExists;
		else if($data["ID"] == null && array_key_exists("ID", $data))
			return ErrorTemplatesId::MenuCategory_NoData;
		else if(!preg_match("/^[\\p{L},' ']+$/", $data['title']) && array_key_exists("title", $data))
			return ErrorTemplatesId::MenuItem_NoValidTitle;
		return ErrorTemplatesId::MenuCategory_UpdateSuccess;
	}
}
?>