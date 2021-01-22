<?php
  class View extends Model {
    public $x = "12";
    public function getTasks(){
      $sql = "SELECT * FROM tasks";
      return $this->get($sql);
    }
  }
