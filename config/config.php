<?php
define('SITE_ROOT', getcwd());
define('HTTP_SERVER_PORT', '80');
define('VIEW_DIRECTORY',SITE_ROOT.'/view/');
define('CONTROLLER_DIR',SITE_ROOT.'/controller/');
define('MODEL_DIR',SITE_ROOT.'/model/');
define('CONFIG_DIR',SITE_ROOT.'/config/');
define('RAZORPAY', SITE_ROOT . '/libs/razorpay_php/');

define('DB_PERSISTENCY', 'true');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'cricketbetting');
define('PDO_DSN', 'mysql:host='.DB_SERVER.';dbname='.DB_DATABASE);
?>