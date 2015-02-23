<?php


session_start();

if (array_key_exists("username", $_SESSION))
{
	include "view/welcome.phtml";
}
else
{
	include "view/login.phtml";
}