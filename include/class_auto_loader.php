<?php
  spl_autoload_register("classCatcher");

  function classCatcher($className) {
    $URI = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    if( strpos($URI,"include") )
      $path = "../library/". $className . ".class.php";
    else
      $path = "library/" . $className . ".class.php";

    if(!file_exists($path))
      echo " <br>Class #-> " .$className . " is incorrect!<br>";

    include $path;
  }
