<?php

require_once 'app/Actions/UrlShortener.php';
require_once 'app/Models/User.php';
require_once 'app/Actions/CreateReport.php';
$pdo = require 'database/db_connect.php';
session_start();

$pageTitle = "Сокращение ссылок";
$localHost = $_SERVER['HTTP_HOST'];

$username = null;

if (!isset($_SESSION['username'])) {
    header("Location: /?controller=auth");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: /?controller=auth");
    die();
}

// Инициализация объекта для сокращения ссылок
$urlShortener = new UrlShortener($pdo);

// Обработка AJAX-запроса
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
    $originalUrl = $_POST['url'];
    $shortUrl = $urlShortener->generateShortUrl($originalUrl);
    print($shortUrl);
    exit;
}

// Обработка запроса на редирект
if (isset($_GET['s'])) {
    $shortUrl = $_GET['s'];
    $originalUrl = $urlShortener->getOriginalUrl($shortUrl);

    if ($originalUrl) {
        header("Location:$originalUrl");
        $urlShortener->countFollowURL($shortUrl);
        exit;
    } else {
        die("URL не найден");
    }
}

// Получение массива данных для отчета
$reportObj = new CreateReport($_SESSION['userId'], $pdo);
$reports = $reportObj->getReport();

$disabled = "disabled";
//Подключение HTML файла index
include 'resources/views/index.php';