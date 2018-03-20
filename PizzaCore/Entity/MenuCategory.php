<?php
class MenuCategory implements JsonSerializable {
	private $title;
	private $ID;
	
	//Getters, setters 
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getID()
	{
		return $this->ID;
	}
	
	public function setTitle($_title)
	{
		return $this->title = $_title;
	}

	public function setID($_ID)
	{
		return $this->ID = $_ID;
	}

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"title" => $this->getTitle(),
			"ID" => $this->getID()
		);
    }
}
?>