<?php
class User  implements JsonSerializable {
	private $login;
	private $password;
	private $salt;
	private $ID;
	
	
	//Getters, setters 
	public function getLogin()
	{
		return $this->login;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function getSalt()
	{
		return $this->salt;
	}
	
	public function getID()
	{
		return $this->ID;
	}
	
	public function setID($_ID)
	{
		return $this->ID = $_ID;
	}

	public function setLogin($_login)
	{
		return $this->login = $_login;
	}
	
	public function setPassword($_password)
	{
		return $this->password = $_password;
	}
	
	public function setSalt($_salt)
	{
		return $this->salt = $_salt;
	}

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"login" => $this->getLogin(),
			"ID" => $this->getID()
			//never return salt & password hash
		);
    }
}
?>