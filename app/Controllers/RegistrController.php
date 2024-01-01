<?php

use Models\User;

require_once 'app/Models/User.php';
require_once 'app/Controllers/UserController.php';
$pdo = require 'database/db_connect.php';
session_start();

$error = null;
$pageTitle = "Регистрация";

if (isset($_POST['usernameReg'], $_POST['passwordReg'])) {
    ['usernameReg' => $username, 'passwordReg' => $plainPassword] = $_POST;

    $newUser = new User($username);

    $userProvider = new UserController($pdo);

    if (!$userProvider->checkUsername($username)) {

        $error = 'Пользователь с указанными учетными данными уже существует';

    } else {

        try {
            $newUser->setId($userProvider->registerUser($newUser, $plainPassword));
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        $_SESSION['username'] = $newUser;
        $_SESSION['userId'] = $newUser->getId();
        header("Location: / ");
        die();

    }
}
$disabled = "";

include "resources/views/registration.php";
