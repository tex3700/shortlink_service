<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php' ?>

<body>
<div class="container text-center">
    <div class="row">
        <form method="post" class="sign-in-form mt-5">
            <h3>Регистрация пользователя</h3>
            <div class="alert alert-danger <?=$error === null ? 'visually-hidden' : ''?>">
                <?=$error?>
            </div>
            <label for="usernameReg" class="visually-hidden">Логин</label>
            <input type="text" id="usernameReg" name="usernameReg" class="form-control mt-3" placeholder="Введите логин" required="" autofocus="">
            <label for="passwordReg" class="visually-hidden">Пароль</label>
            <input type="password" id="passwordReg" name="passwordReg" class="form-control mt-3" placeholder="Введите пароль" required="">
            <button class="w-75 btn btn-primary mt-2" type="submit">Зарегистрироваться</button>
            <div class="mt-3">
                <a href="/">Уже зарегистрированы?</a>
            </div>
        </form>
    </div>
</div>
</body>
