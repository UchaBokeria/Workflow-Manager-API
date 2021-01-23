<?php
  include_once "include/class_auto_loader.php";

  header("Access-Control-Allow-Origin: *");
  header("Content-type: application/json");

  // count by date - countByDate
  // search by id - id
  // search by title - title
  // search by date - date

  // API FOR TEST - bae7b908-f12f-487b-96c7-47a696582aa4

  if(!isset($_GET["API_KEY"])){
    echo json_encode($arr = array("err"=>"Need api key","res"=>false));
  }
  else {
    $check = new Contrl();
    $verify = $check->checkAPI_KEY($_GET["API_KEY"]);

    if($verify == false)
      echo json_encode($arr = array("err"=>"Wrong api key","res"=>false));

    else {
      $view = new View();
      $result = $view->getTasks();
      $Found = "Not found";

      // count tasks by date
      if( isset($_GET["countByDate"]) ) {
        $Found = 0;

        for ($i=0; $i < count($result); $i++)
          if($result[$i]["task_date"] == $_GET["countByDate"])
            $Found++;

        echo json_encode($Found);
      }

      // Search by title
      elseif( isset($_GET["title"]) ){
        $Found = array();
        foreach ($result as $value)
          if($value["title"] == $_GET["title"])
            array_push($Found,$value);


        echo json_encode($Found);


      }

      // Search by date
      elseif( isset($_GET["date"]) ){
        $Found = array();
        foreach ($result as $value)
          if($value["task_date"] == $_GET["date"])
            array_push($Found,$value);


        echo json_encode($Found);
      }

      // Search by id
      elseif( isset($_GET["id"]) ){
        foreach ($result as $value)
          if($value["id"] == $_GET["id"])
            $Found = $value;

        echo json_encode($Found);
      }

      else
        echo json_encode($result);

    }
  }
