
<?php

session_start();

$pdo = require 'database/db_connect.php';

$controller = $_GET['controller'] ?? 'index';

$routes = require 'routes.php';

require_once $routes[$controller];

