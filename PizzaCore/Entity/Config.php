<?php
class Config implements JsonSerializable {
	private $title;
	private $position;
	private $contactNumber;
	private $cashChar;
	private $descriptionGallery1;
	private $descriptionGallery2;
	private $ID;
	
	//Getters, setters 
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getPosition()
	{
		return $this->position;
	}
	
	public function getContactNumber()
	{
		return $this->contactNumber;
	}
	
	public function getCashChar()
	{
		return $this->cashChar;
	}

	public function getDescriptionGallery1()
	{
		return $this->descriptionGallery1;
	}

	public function getDescriptionGallery2()
	{
		return $this->descriptionGallery2;
	}
	
	public function getID()
	{
		return $this->ID;
	}
	
	public function setID($_ID)
	{
		return $this->ID = $_ID;
	}

	public function setTitle($_title)
	{
		return $this->title = $_title;
	}
	
	public function setPosition($_position)
	{
		return $this->position = $_position;
	}
	
	public function setContactNumber($_number)
	{
		return $this->contactNumber = $_number;
	}
	
	public function setCashChar($_cc)
	{
		return $this->cashChar = $_cc;
	}

	public function setDescriptionGallery1($_desc)
	{
		return $this->descriptionGallery1 = $_desc;
	}

	public function setDescriptionGallery2($_desc)
	{
		return $this->descriptionGallery2 = $_desc;
	}
	

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"title" => $this->getTitle(),
			"position" => $this->getPosition(),
			"contactNumber" => $this->getContactNumber(),
			"cashChar" => $this->getCashChar(),
			"descriptionGallery1" => $this->getDescriptionGallery1(),
			"descriptionGallery2" => $this->getDescriptionGallery2(),
			"ID" => $this->getID()
		);
    }
}
?>