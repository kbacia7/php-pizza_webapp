<?php
interface IEntityManager
{
	public static function create($options);
	public static function remove($row);
	public static function load($ID);
}

?>