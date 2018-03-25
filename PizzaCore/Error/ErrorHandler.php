<?php
class ErrorHandler {

	public static function createErrorsModels() {
		foreach(ErrorTemplates::$templates as $k => $v)
		{
			ErrorTemplates::$templates[$k] = self::create(ErrorTemplates::$templates[$k]);
		}
	}

	public static function createFromTemplate($templateID) {
		self::push(ErrorTemplates::$templates[$templateID]);
	}

	public static function create($options) {
		$functionManager = new FunctionManager();
		$error = new ErrorMessage();
		foreach($options as $k => $v)
			$functionManager->excetuteBasicMethod($error, "set", $k, $v);
		return $error;
	}

	public static function push($error) {
		if($_SESSION['errors'] == null)
			$_SESSION['errors'] = array();
		$_SESSION['errors'][] = $error;
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