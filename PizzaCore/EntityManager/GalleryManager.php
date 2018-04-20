<?php
class GalleryManager implements IEntityManager {
	private static $tableName = "gallery_item";
	
	//Interfaces methods
	public static function create($options) {
		$queryBuild = new QueryBuilder();
		$functionManager = new FunctionManager();
		$queryBuild->insert(self::$tableName, $options);
		$newGalleryItem = new GalleryItem();
		foreach($options as $k => $v)
			$functionManager->excetuteBasicMethod($newGalleryItem, "set", $k, $v);
		$functionManager->excetuteBasicMethod($newGalleryItem, "set", "ID", $queryBuild->getLastID());
		return $newGalleryItem;
	}
	
	public static function remove($row) {
		$queryBuild = new QueryBuilder();
		return $queryBuild->remove(self::$tableName, $row);
	}

	public static function load($data) {
		$queryBuild = new QueryBuilder();
		$galleryItemArray = array();
		$functionManager = new FunctionManager();
		
		$q = null;
		if($data !== null)
			$q = $queryBuild->select(self::$tableName, array("*"),$data);
		else 
			$q = $queryBuild->select(self::$tableName, array("*"));
		while($rowGalleryItems = $q->fetch(PDO::FETCH_ASSOC))
		{
			$galleryItemObject = new GalleryItem();
			foreach($rowGalleryItems as $col => $colValue)
			{
				$functionManager->excetuteBasicMethod($galleryItemObject, "set", $col, $colValue);
			}
			$galleryItemArray[] = $galleryItemObject;
		}
		return $galleryItemArray;
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
			return ErrorTemplatesId::Gallery_ImageDescriptionEmpty; //TODO: Create error
		else if(array_key_exists("ID", $data) && $data["ID"] == null)
			return ErrorTemplatesId::Gallery_ImageDescriptionEmpty; //TODO: Create error
		else if($data["galleryID"] != 1 && $data["galleryID"] != 2)
			return ErrorTemplatesId::Gallery_ImageDescriptionEmpty; //TODO: Create error
		else if(strlen($data["description"]) <= 0 && $data["galleryID"] == 1)
			return ErrorTemplatesId::Gallery_ImageDescriptionEmpty; 		
		return ErrorTemplatesId::Gallery_ImageUploaded; //TODO: Create error
	}
}
?>