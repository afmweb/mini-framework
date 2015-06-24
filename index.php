<?php 

require './vendor/autoload.php';
require './app/classes/sys/config.php';

//$model = new Model();
$controller =  new \ControllerMain();
$controller->run();

