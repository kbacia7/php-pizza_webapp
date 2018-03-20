<?php
class MenuItem implements JsonSerializable {
	private $title;
	private $price;
	private $parent;
	private $ID;
	
	//Getters, setters 
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getParent()
	{
		return $this->parent;
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
	
	public function setPrice($_price)
	{
		return $this->price = $_price;
	}
	
	public function setParent($_parent)
	{
		return $this->parent = $_parent;
	}

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"title" => $this->getTitle(),
			"price" => $this->getPrice(),
			"parent" => $this->getParent(),
			"ID" => $this->getID()
		);
    }
}
?>