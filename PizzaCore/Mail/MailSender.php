<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MailSender {
	public static function send($to, $topic, $message, $name) {
		$config = new ConfigLoader();
		$data = $config->GetConfig();

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Encoding = "base64";
		$mail->CharSet = 'UTF-8';
		$mail->SMTPDebug = 0;
		$mail->Host = $data["smtpHost"];
		$mail->Port = $data["smtpPort"];
		$mail->SMTPSecure = $data["smtpSecure"];
		$mail->SMTPAuth = true;
		$mail->Username = $data["smtpUser"];
		$mail->Password = $data["smtpPassword"];
		$mail->setFrom($data["smtpUser"], $data["smtpAuthorName"]);
		$mail->addAddress($to, $name);
		$mail->Subject = $topic;
		$mail->Body = $message;
		$mail->IsHTML(true); 
		$mail->send();
	}	
}
?>