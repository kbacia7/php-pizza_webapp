<?php
class UserManager implements IEntityManager {
	private static $tableName = "accounts";
	
	//Interfaces methods
	public static function create($options) {
		$functionManager = new FunctionManager();
		$hashPassword = self::hashPassword($options["password"]);
		$options["salt"] = $hashPassword[0];
		$options["password"] = $hashPassword[1];
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
		if(array_key_exists("password", $data))
		{
			$hashPassword = self::hashPassword($data["password"]);
			$data["salt"] = $hashPassword[0];
			$data["password"] = $hashPassword[1];
		}
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

	public static function hashPassword($p) {
		$r = new RandomString();
		$config = new ConfigLoader();
		$data = $config->GetConfig();
		$salt = hash("md5", $data["accSalt"]) . $r->Random(15); //MD5(GlobalHash) + random string
		$password = hash("sha256", $p . $salt, false); //Sha256(password + salt)
		return array($salt, $password);
	}

	public static function isValidData($data)
	{
		if($data == null)
			return ErrorID::User_DoesntExists;
		else if(!array_key_exists("admin", $data) || strlen($data['admin']) <= 0)
			return ErrorID::User_EmptyAdmin;
		else if(array_key_exists("ID", $data) && $data["ID"] == null)
			return ErrorID::User_EmptyData;
		else if(!array_key_exists("firstName", $data) || strlen($data['firstName']) <= 0)
			return ErrorID::User_EmptyFirstName;
		else if(!array_key_exists("lastName", $data) || strlen($data['lastName']) <= 0)
			return ErrorID::User_EmptyLastName;
		else if(array_key_exists("firstName", $data) && !preg_match("/^[\s\p{L}]+$/u", $data['firstName']))
			return ErrorID::User_InvalidFirstName;
		else if(array_key_exists("lastName", $data) && !preg_match("/^[\s\p{L}]+$/u", $data['lastName']))
			return ErrorID::User_InvalidLastName;
		else if(!array_key_exists("password", $data) || strlen($data['password']) < 5)
			return ErrorID::User_EmptyPassword; 
		else if(!array_key_exists("login", $data) || strlen($data['login']) < 5)
			return ErrorID::User_EmptyLogin; 
		else if(array_key_exists("login", $data) && !preg_match("/^[a-zA-Z0-9_.@]*$/", $data['login']))
			return ErrorID::User_InvalidLogin; 
		return ErrorID::User_CreateComplete;
	}
	
}
?>