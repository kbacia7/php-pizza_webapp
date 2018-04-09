<?php
class User  implements JsonSerializable {
	private $login;
	private $password;
	private $salt;
	private $admin;
	private $firstName;
	private $lastName;
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

	public function getAdmin()
	{
		return $this->admin;
	}
	
	public function getFirstName()
	{
		return $this->firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
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

	public function setAdmin($_adm)
	{
		return $this->admin = $_adm;
	}

	public function setFirstName($_firstName)
	{
		return $this->firstName = $_firstName;
	}

	public function setLastName($_lastName)
	{
		return $this->lastName = $_lastName;
	}

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"login" => $this->getLogin(),
			"ID" => $this->getID(),
			"admin" => $this->getAdmin(),
			'firstName' => $this->getFirstName(),
			'lastName' => $this->getLastName()
			//never return salt & password hash
		);
    }
}
?>