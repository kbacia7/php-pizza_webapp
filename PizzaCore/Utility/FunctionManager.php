<?php
class FunctionManager {
	public static function excetuteBasicMethod($object, $type, $property, $value)
	{
		$property = ucfirst($property);
		$methodSkielet = sprintf("%s%s", $type, $property);
		if($type === "set")
			$object->$methodSkielet($value);
		else if($type === "get")
			$object->$methodSkielet();
	}
}
?>