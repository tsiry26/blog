<?php
/**
 * Created by PhpStorm.
 * User: wap17
 * Date: 23/02/15
 * Time: 16:20
 */
require_once("helper/helper.class.php");

Class Model_User
{
    private $db = new Helper_Database("mysql:host=127.0.0.1;dbname=blog", "root", "troiswa");

    public function verifLogin($login, $password)
    {
        private $user = $this -> $db->fetchAll("SELECT * FROM users WHERE name = :username OR email = :username", array("username" => $login));
        if ($user){
                if (password_verify($password, $user["password"])){
                    return $user;
                }
        }
    }
}