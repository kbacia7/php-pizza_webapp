<?php
class RandomString {
	public function Random($len) {
		$random_string = "";
		for($i = 0; $i < $len; $i++)
			$random_string = $random_string . chr(rand(65, 122));
		return  $random_string;
	}
}
?>