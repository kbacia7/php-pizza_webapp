<?php
class NotificationManager  {
	public static function send($title, $content) {
        $configLoader = new ConfigLoader();
        $config = $configLoader->GetConfig();
		$iconPath = $_SERVER['REQUEST_SCHEME'] . "://". $_SERVER['HTTP_HOST'] . '/images/pizzaicon.png';

		$fields = array(
			'app_id' => $config["oneSignalAppID"],
			'included_segments' => array('All'),
            'data' => array("status" => "SEND"),
			'contents' => array("en" => $content),
			'headings' => array("en" => $title),
			'chrome_big_picture' => $iconPath,
			'chrome_web_icon' => $iconPath,
			'small_icon' => $iconPath
        );       		
        $fields = json_encode($fields);
        
        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												    sprintf('Authorization: Basic %s', $config['oneSignalRestAPIKey'])));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
	}

	public static function isValidData($data) {
		if($data == null)
			return ErrorID::Notification_EmptyData;
		else if(!array_key_exists("title", $data) || strlen($data['title']) <= 0)
			return ErrorID::Notification_EmptyTitle;
		else if(!array_key_exists("message", $data) || strlen($data['message']) <= 0)
			return ErrorID::Notification_EmptyMessage;
		return ErrorID::Notification_SendComplete;

	}
}
?>