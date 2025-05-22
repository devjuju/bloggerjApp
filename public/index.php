<?php
session_start();
// to display the error message
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require "src/core/router.php";
require "../vendor/autoload.php";

use App\Core\Router;

$router = new Router();
$router->run();
