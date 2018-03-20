<?php
class PizzaException extends Exception {
	public function __construct($message) 
	{
		parent::__construct(sprintf("Opsss, %s", strtolower($message)));
	}
}
?>