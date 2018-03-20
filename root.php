<?php
$dir = dirname(dirname(__FILE__));
$rootStr = substr(dirname(dirname(__FILE__)), 0, strpos(dirname(dirname(__FILE__)), "/PizzaCore/") + strlen("/PizzaCore/")); 
define('__ROOT__', $rootStr); 
?>