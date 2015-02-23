
<?php

/*
** Login.php
*/

if (array_key_exists("password", $_POST) && array_key_exists("login", $_POST))
{

	$userManager = new Model_User();

	if ($userManager->verifLogin($_POST["login"], $_POST["password"]) != false)
	{

		$_SESSION["id"] = $user["id"];
		$_SESSION["username"] = $user["username"];

		header("Location: index.php");
	}


}
include "view/login.phtml";







//require("helper/helper.class.php");
//
//session_start();
//$db = new Helper_Database("mysql:host=127.0.0.1;dbname=blog", "root", "troiswa");;
//
//
//if (array_key_exists("username", $_POST) == false || array_key_exists("password", $_POST) == false)
//{
//	header("Location: index.php");
//	exit();
//}
//
//
//$user = $db->fetchAll("SELECT * FROM users WHERE name = :username OR email = :username", array("username" => $_POST["username"]));
//
//
//if ($user)
//{
//	if (password_verify($_POST["password"], $user["password"]))
//	{
//		$_SESSION["id"] = $user["id"];
//		$_SESSION["username"] = $user["username"];
//	}
//	else
//	{
//		$_SESSION["error"] = "Invalid password";
//	}
//}
//else
//{
//	$_SESSION["error"] = "Unknown user";
//}
//
//header("Location: index.php");
