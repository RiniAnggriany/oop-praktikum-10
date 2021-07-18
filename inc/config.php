<?php 

error_reporting(E_ALL);

session_start();

define("URL", "http://localhost/oop-praktikum-10");
define("AST", URL . "/layouts/assets"); 

 define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR); 

  require_once ROOT. "vendor/autoload.php";

   $whoops = new \Whoops\Run;
   $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
   $whoops->register(); 