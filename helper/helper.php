<?php

Class Helper_Database
{
    private $db;
    public function __construct($queryString, $user, $password)
    {
        $this -> db= new PDO($queryString, $user, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("SET NAMES UTF8");
    }

    public function fetchAll($query, $data = array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        $res = $query->fetchAll();

        return $res;
    }

    public function fetch($query, $data = array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        $res = $query->fetch();

        return $res;
    }

}

//$db = new Helper_Database("mysql:host=127.0.0.1;dbname=minichat", "root", "troiswa");
//$messages = $db->fetchAll("SELECT * FROM message WHERE user = :id", array("id" => 2));