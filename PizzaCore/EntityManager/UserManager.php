<?php
class UserManager implements IEntityManager {
	private static $tableName = "accounts";
	
	//Interfaces methods
	public static function create($options) {
		$functionManager = new FunctionManager();
		$r = new RandomString();
		$config = new ConfigLoader();
		$data = $config->GetConfig();
		$salt = hash("md5", $data["accSalt"]) . $r->Random(15); //MD5(GlobalHash) + random string
		$password = hash("sha256", $options["password"] . $salt, false); //Sha256(password + salt)
		$options["salt"] = $salt;
	 	$options["password"] = $password;
		$queryBuild = new QueryBuilder();
		$queryBuild->insert(self::$tableName, $options);
		
		$newUser = new User();
		foreach($options as $k => $v)
			$functionManager->excetuteBasicMethod($newUser, "set", $k, $v);
		$functionManager->excetuteBasicMethod($newUser, "set", "ID", $queryBuild->getLastID());
		return $newUser;
	}
	
	public static function remove($row) {
		$queryBuild = new QueryBuilder();
		return $queryBuild->remove(self::$tableName, $row);
	}
	
	public static function load($data) {
		$queryBuild = new QueryBuilder();
		$userArray = array();
		$functionManager = new FunctionManager();
		$q = $queryBuild->select(self::$tableName, array("*"), $data);

		while($rowUser = $q->fetch(PDO::FETCH_ASSOC))
		{
			$userObject = new User();
			foreach($rowUser as $col => $colValue)
			{
				$functionManager->excetuteBasicMethod($userObject, "set", $col, $colValue);
			}
			$userArray[] = $userObject;
		}
		return $userArray;
	}

	public static function update($data, $id)
	{
		$queryBuild = new QueryBuilder();
		$functionManager = new FunctionManager();
		$queryBuild->update(self::$tableName, $data, array("ID" => $id));
		return true;
	}

	//other
	public static function isCorrectPassword($password, $login) {		
		$queryBuild = new QueryBuilder();
		$queryStr = sprintf("SELECT `ID` FROM %s WHERE password =  SHA2(CONCAT('%s', `salt`), 256) AND login = '%s'", self::$tableName, $password, $login);
		$q = $queryBuild->customQuery($queryStr);
		$uData = $q->fetch(PDO::FETCH_ASSOC);
		if(!$uData)
			return null;
		else
			return self::load(array("ID" => $uData['ID']));
	}

	
}
?>