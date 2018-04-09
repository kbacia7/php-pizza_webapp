<?php
class ContactMessageManager implements IEntityManager {
	private static $tableName = "contact_message";
	
	//Interfaces methods
	public static function create($options) {
		$queryBuild = new QueryBuilder();
		$functionManager = new FunctionManager();
		$a = $queryBuild->insert(self::$tableName, $options);
		$newMessage = new ContactMessage();
		foreach($options as $k => $v)
			$functionManager->excetuteBasicMethod($newMessage, "set", $k, $v);
		$functionManager->excetuteBasicMethod($newMessage, "set", "ID", $queryBuild->getLastID());
		$newMessage->setDateSend(date("Y-m-d H:i:s"));
		return $newMessage;
	}
	
	public static function remove($row) {
		$queryBuild = new QueryBuilder();
		return $queryBuild->remove(self::$tableName, $row);
	}

	public static function load($data) {
		$queryBuild = new QueryBuilder();
		$messagesArray = array();
		$functionManager = new FunctionManager();
		
		$q = null;
		if($data !== null)
			$q = $queryBuild->select(self::$tableName, array("*"),$data);
		else 
			$q = $queryBuild->select(self::$tableName, array("*"));
		while($rowMessage = $q->fetch(PDO::FETCH_ASSOC))
		{
			$contactMessageObject = new ContactMessage();
			foreach($rowMessage as $col => $colValue)
			{
				$functionManager->excetuteBasicMethod($contactMessageObject, "set", $col, $colValue);
			}
			$messagesArray[] = $contactMessageObject;
		}
		return $messagesArray;
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