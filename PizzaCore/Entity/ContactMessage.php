<?php
class ContactMessage implements JsonSerializable {
	private $message;
	private $author;
	private $dateSend;
	private $roomID;
	private $ID;
	
	//Getters, setters 
	public function getMessage()
	{
		return $this->message;
	}
	
	public function getAuthor()
	{
		return $this->author;
	}

	public function getDateSend()
	{
		return $this->dateSend;
	}

	public function getRoomID()
	{
		return $this->roomID;
	}

	public function getID()
	{
		return $this->ID;
	}
	
	public function setMessage($_message)
	{
		return $this->message = $_message;
	}

	public function setAuthor($_author)
	{
		return $this->author = $_author;
	}
	
	public function setDateSend($_date)
	{
		return $this->dateSend = $_date;
	}

	public function setRoomID($_room)
	{
		return $this->roomID = $_room;
	}

	public function setID($_ID)
	{
		return $this->ID = $_ID;
	}

	//serialize JSON
	public function jsonSerialize() {
        return array(
			"message" => $this->getMessage(),
			"author" => $this->getAuthor(),
			"roomID" => $this->getRoomID(),
			"dateSend" => explode(' ', $this->getDateSend())[0],
			"ID" => $this->getID()
		);
    }
}
?>