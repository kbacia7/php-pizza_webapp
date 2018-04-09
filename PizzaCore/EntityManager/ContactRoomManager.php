<?php
class ContactRoomManager implements IEntityManager {
	private static $tableName = "contact_room";
	
	//Interfaces methods
	public static function create($options) {
		$queryBuild = new QueryBuilder();
		$functionManager = new FunctionManager();
		$queryBuild->insert(self::$tableName, $options);
		$newRoom = new ContactRoom();
		foreach($options as $k => $v)
			$functionManager->excetuteBasicMethod($newRoom, "set", $k, $v);
		$functionManager->excetuteBasicMethod($newRoom, "set", "ID", $queryBuild->getLastID());
		return $newRoom;
	}
	
	public static function remove($row) {
		$queryBuild = new QueryBuilder();
		return $queryBuild->remove(self::$tableName, $row);
	}

	public static function load($data) {
		$queryBuild = new QueryBuilder();
		$roomArray = array();
		$functionManager = new FunctionManager();
		
		$q = null;
		if($data !== null)
			$q = $queryBuild->select(self::$tableName, array("*"),$data);
		else 
			$q = $queryBuild->select(self::$tableName, array("*"));
		while($rowRoom = $q->fetch(PDO::FETCH_ASSOC))
		{
			$contactRoomObject = new ContactRoom();
			foreach($rowRoom as $col => $colValue)
			{
				$functionManager->excetuteBasicMethod($contactRoomObject, "set", $col, $colValue);
			}
			$roomArray[] = $contactRoomObject;
		}
		return $roomArray;
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