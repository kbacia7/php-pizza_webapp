<?php
class ContactRoom implements JsonSerializable {
	private $title;
	private $email;
	private $ID;
	
	//Getters, setters 
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getEmail()
	{
		return $this->email;
	}

	public function getID()
	{
		return $this->ID;
	}
	
	public function setTitle($_title)
	{
		return $this->title = $_title;
	}

	public function setEmail($_mail)
	{
		return $this->email = $_mail;
	}

	public function setID($_ID)
	{
		return $this->ID = $_ID;
	}

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"title" => $this->getTitle(),
			"email" => $this->getEmail(),
			"ID" => $this->getID()
		);
    }
}
?>