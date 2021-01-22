<?php
  class Model extends Dbh {
    protected function get($sql){
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    protected function getBy($sql,$param){
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$param]);
      return $stmt->fetchAll();
    }



  }
