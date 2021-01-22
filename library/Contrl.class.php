<?php
  class Contrl extends Model {
    public function checkAPI_KEY($API_KEY){
      $sql = "SELECT * FROM accounts WHERE API_KEY = ?";
      $result = $this->getBy($sql,$API_KEY);

      return count($result) > 0 ? true : false ;
    }

  }
