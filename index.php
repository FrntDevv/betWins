<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
require_once 'config/config.php';
require_once MODEL_DIR.'database_handler.php';
require_once MODEL_DIR.'database_operations.php';
require_once VIEW_DIRECTORY.'router.php';
require_once RAZORPAY . 'Razorpay.php';
require_once SITE_ROOT. '/generalFunctions.php';
require_once 'globalSession.php';
?>