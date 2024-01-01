<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php' ?>

<body>
    <div class="container text-center">
        <div class="row">
            <form method="post" class="sign-in-form mt-5">
                <h3>Авторизация</h3>
                <div class="alert alert-danger <?=$error === null ? 'visually-hidden' : ''?>">
                    <?=$error?>
                </div>
                <label for="username" class="visually-hidden">Пользователь</label>
                <input type="text" id="username" name="username" class="form-control mt-3" placeholder="Логин" required="" autofocus="">
                <label for="password" class="visually-hidden">Пароль</label>
                <input type="password" id="password" name="password" class="form-control mt-3" placeholder="Пароль" required="">
                <button class="sub-btn w-75 btn btn-primary mt-2" type="submit">Войти</button>
            </form>
            <a href="/?controller=registration">Регистрация</a>
        </div>
    </div>
</body>
