<?php

require_once 'app/Controllers/UserController.php';
require_once 'app/Models/User.php';
$pdo = require 'database/db_connect.php';
session_start();

$error = null;

$pageTitle = "Авторизация";

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserController($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['username'] = $user;
        $_SESSION['userId'] = $user->getId();
        header("Location: /");
        die();
    }
}
$disabled = "";
include "resources/views/auth.php";