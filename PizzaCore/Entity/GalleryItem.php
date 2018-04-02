<?php
class GalleryItem implements JsonSerializable {
	private $description;
	private $path;
	private $galleryID;
	private $ID;
	
	//Getters, setters 
	public function getDescription()
	{
		return $this->description;
	}
	
	public function getPath()
	{
		return $this->path;
	}
	
	public function getGalleryID()
	{
		return $this->galleryID;
	}
	
	public function getID()
	{
		return $this->ID;
	}
	
	public function setDescription($_description)
	{
		return $this->description = $_description;
	}
	
	public function setPath($_path)
	{
		return $this->path = $_path;
	}
	
	public function setGalleryID($_gID)
	{
		return $this->galleryID = $_gID;
	}
	
	public function setID($_id)
	{
		return $this->ID = $_id;
	}
	

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"description" => $this->getDescription(),
			"path" => $this->getPath(),
			"galleryID" => $this->getGalleryID(),
			"ID" => $this->getID()
		);
    }
}
?>