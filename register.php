<?php

require("helper.php");
session_start();
$db = new Helper_Database("mysql:host=127.0.0.1;dbname=blog", "root", "troiswa");



if (array_key_exists("password", $_POST) && array_key_exists("username", $_POST) && array_key_exists("email", $_POST))
{
	$messages = $db->fetchAll("INSERT INTO users(name, email, password)
				  VALUES(:username, :email, :password)", array("username" => $_POST["username"],
																"email" => $_POST["email"],
																"password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
																));


	$_SESSION["username"] = $_POST["username"];
	$_SESSION["id"] = $db->lastInsertId();


	header("Location: index.php");
	exit();
}
else
{
	include "register.phtml";
}