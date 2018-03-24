<?php
abstract class ErrorTypes //Fake enumerator like enum in C#
{
    const SUCCESS = 0;
    const WARNING = 1;
    const ERROR = 2;
    const FATAL_ERROR = 3; //Only from server-side PHP
}
?>