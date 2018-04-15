<?php
class LoginGuard {
	public static function isAdmin()
	{
        if(self::isUser() && array_key_exists("admin", $_SESSION))
            return true;
        else 
            return false;
    }
    
    public static function isUser()
	{
        if(array_key_exists("userID", $_SESSION))
            return true;
        else 
            return false;
	}
}
?>