<?php
define('URLBASE', 'http://localhost:8080');
define('ROOTDIR', __DIR__  . '/');
define('ROTADEFAULT', 'home');


require_once './bootstrap.php';
require_once ROOTDIR . 'vendor/autoload.php';


//use Controller;

$teste = new \Sys\Core();



echo '<br>';
//echo $teste->getUrlAtual();

echo '<hr>';


