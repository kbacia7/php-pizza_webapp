<?php 

class ConfigLoader 
{
	private $config = null;
	private function LoadConfig()
	{
		$configFile = fopen(RequirePath::ConfigPath(), "r");
		$jsonData = fread($configFile, filesize(RequirePath::ConfigPath()));
		$configData = json_decode($jsonData, true);
		$this->config = $configData;
	}
	
	public function GetConfig()
	{
		if($this->config == null)
			$this->LoadConfig();
		return $this->config;
	}
}
?>