<?php
class ErrorMessage implements JsonSerializable {
	private $title;
	private $description;
	private $code;
	
	//Getters, setters 
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function getCode()
	{
		return $this->code;
	}

	public function setTitle($_title)
	{
		return $this->title = $_title;
	}
	
	public function setDescription($_d)
	{
		return $this->description = $_d;
	}
	
	public function setCode($_code)
	{
		return $this->code = $_code;
	}

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"title" => $this->getTitle(),
			"description" => $this->getDescription(),
			"code" => $this->getCode()
		);
    }
}
?>