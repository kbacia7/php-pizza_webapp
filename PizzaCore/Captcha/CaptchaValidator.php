<?php
class CaptchaValidator {
	public static function validate($responseCaptcha) {
		$config = new ConfigLoader();
		$data = $config->GetConfig();
		$post_data = http_build_query(
			array(
				'secret' => $data["googleRESecretKey"],
				'response' => $responseCaptcha
			)
		);
		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);

		return json_decode($response)->success;
	}
}
?>