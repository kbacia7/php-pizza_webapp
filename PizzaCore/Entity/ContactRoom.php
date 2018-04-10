<?php
class ContactRoom implements JsonSerializable {
	private $title;
	private $owner;
	private $ID;
	
	//Getters, setters 
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getOwner()
	{
		return $this->owner;
	}

	public function getID()
	{
		return $this->ID;
	}
	
	public function setTitle($_title)
	{
		return $this->title = $_title;
	}

	public function setOwner($_own)
	{
		return $this->owner = $_own;
	}

	public function setID($_ID)
	{
		return $this->ID = $_ID;
	}

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"title" => $this->getTitle(),
			"owner" => $this->getOwner(),
			"ID" => $this->getID()
		);
    }
}
?>