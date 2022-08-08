<?php

use Core\Session;

?>
<div class="registration">
    <form class="registration-form" id="cart-form" action="" method="post">
        <label for="full_name">Прізвище та ім'я</label>
        <input class="registration-input" id="full_name" type="text" name="full_name" maxlength="50"
               placeholder="Введіть прізвище та ім'я"
               required>
        <label for="login-reg">Логін</label>
        <input class="registration-input" id="login-reg" type="text" name="login" maxlength="50"
               placeholder="Введіть логін"
               required>
        <label for="phone">Номер телефону у форматі +380ХХХХХХХХХ</label>
        <input class="registration-input" id="phone" type="tel" name="phone" pattern="^\+380\d{9}$"
               title="Формат: +380ХХХХХХХХХ" placeholder="+380ХХХХХХХХХ" required/>
        <label for="email">Пошта</label>
        <input class="registration-input" id="email" type="email" name="email" maxlength="50"
               placeholder="Введіть адресу пошти" required>
        <label for="password-reg">Пароль</label>
        <input class="registration-input" id="password-reg" type="password" name="password" minlength="6"
               maxlength="20"
               placeholder="Введіть пароль" required>
        <label for="password_confirm">Підтвердження паролю</label>
        <input class="registration-input" id="password_confirm" type="password" name="password_confirm"
               minlength="6" maxlength="20"
               placeholder="Підтвердіть пароль" required>
        <div>
            <button class="registration-button" type="reset" style="width:49%">Очистити</button>
            <button class="registration-button" type="submit" style="width:49%">Зареєструватись</button>
        </div>
        <p>
            Вже маєте аккаунт? - <a href="login">Aвторизуйтесь!</a>
        </p>
        <?php if (!empty($_SESSION['message'])) : ?>
            <p class="msg"> <?php Session::showMessage(); ?> </p>
        <?php endif; ?>
    </form>
</div>

