<?php 

class DB 
{
    private static $connection = null;
	
	private static function connect()
	{		
		if(self::$connection == null)
		{
			$config = new ConfigLoader();
			$data = $config->GetConfig();
			
			$_PASS = $data["dbPassword"];
			$_HOST = $data["dbHost"];
			$_DB = $data["dbName"];
			$_USER = $data["dbUser"];
			self::$connection = new PDO("mysql:dbname={$_DB};host={$_HOST}", $_USER, $_PASS, array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ERRMODE_EXCEPTION => true,
				PDO::ATTR_ERRMODE => true
			));
			
			//Testing
			try {
				$con = self::$connection;
				$con->query("SELECT 1");	
			}
			catch(Exception $e) {
				echo "Connection failed!<br>";
				echo $e->getMessage();
			}
		}
	}
	
	public static function getConnection() 
	{	
		$con = self::$connection;
		if($con != null)
			return self::$connection;
		else 
		{
			self::connect();
			return self::$connection; 
		}
	}
}
?>