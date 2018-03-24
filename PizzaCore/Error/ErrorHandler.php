<?php
class ErrorHandler {

	public static function createFromTemplate($templateID) {
		return self::create(ErrorTemplates::$templates[$templateID]);
	}

	public static function create($options) {
		if($_SESSION['errors'] == null)
			$_SESSION['errors'] = array();
		$functionManager = new FunctionManager();
		$error = new ErrorMessage();
		foreach($options as $k => $v)
			$functionManager->excetuteBasicMethod($error, "set", $k, $v);
		$_SESSION['errors'][] = $error;
		return $error;
	}
	
	public static function remove($error) {
		if (($key = array_search($error, $_SESSION['errors'])) !== false) {
			unset($_SESSION['errors'][$key]);
		}
	}

	public static function load() {
		$errors = ($_SESSION['errors'] != null) ? ($_SESSION['errors']) : null;
		$_SESSION['errors'] = array();
		return $errors;
	}
}
?>