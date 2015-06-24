<?php
// CONFIGRAÇÕES DO SITE ####################
define('SITE_URL', 'http://localhost/');
define('SITE_NOME', 'AM');
define('PG_INDEX', 'Home'); //controller padrao

//Diretorios
define('DIR_CONTROLLERS', 'app/mvc/controllers/');
define('DIR_VIEWS', 'app/mvc/views/');
define('DIR_VIEWS_TMP', 'app/mvc/views/tmp/');
define('DIR_MODELS', 'app/mvc/models/');
define('DIR_PUBLIC', 'app/public/');

//Banco de Dados
define('DB_DRIVE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'user');
define('DB_PASS', 'pass');
define('DB_DATABASE'  , 'banco');

//Dados de Email
define('MAILHOST','');
define('MAILPORTA', '587');
define('MAILUSUARIO', '');
define('MAILSENHA', '');