<div class="registration">
    <form class="registration-form" action="#" method="post">
        <label for="full_name">ФІБ</label>
        <input class="registration-input" id="full_name" type="text" name="full_name" maxlength="45"
               placeholder="Введіть ФІБ"
               required>
        <label for="login-reg">Логін</label>
        <input class="registration-input" id="login-reg" type="text" name="login" maxlength="45"
               placeholder="Введіть логін"
               required>
        <label for="email">Пошта</label>
        <input class="registration-input" id="email" type="email" name="email" maxlength="45"
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
    </form>
</div>
