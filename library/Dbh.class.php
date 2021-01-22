<?php
  class Dbh {
    private $DBhost = "localhost";
    private $DBuser = "root";
    private $DBpwd = "";
    private $DBname = "worker";

    protected function connect() {
      $connection = new PDO("mysql:host=".$this->DBhost.";dbname=".$this->DBname,$this->DBuser,$this->DBpwd);
      $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

      return $connection;
    }
  }
