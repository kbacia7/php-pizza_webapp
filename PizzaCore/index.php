<?php
session_start();
require_once("Config/ConfigLoader.php");
require_once("Database/DB.php");
require_once("Database/QueryBuilder.php");
require_once("Entity/IEntity.php");
require_once("Entity/User/User.php");
require_once("Utility/RandomString.php");
try {
	$database = DB::getConnection();
	$q = $database->query("SELECT * FROM `accounts`");
	foreach($q as $row) {
		foreach($row as $rowName => $rowValue)
		{
			if(is_string($rowName))
				echo "{$rowName}  = {$rowValue}<br>"; 
		}
	};
	$user = new User();
	$options = array(
		"email" => "kbacia7@gmail.com",
		"login" => "Kk",
		"password" => "jg",
		"points" => 456);
	$user->create($options);
	$user->remove(array(
		"ID" => 81
	));
}
catch(Exception $e) {
	echo $e->getMessage();
}

?>