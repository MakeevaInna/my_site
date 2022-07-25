<?php

use Core\Session;

?>
<div class="authorization">
    <form class="authorization-form" action="" method="post">
        <label for="login">Логін</label>
        <input class="authorization-input" id="login" type="text" name="login" maxlength="45"
               placeholder="Введіть логін" required>
        <label for="password">Пароль</label>
        <input class="authorization-input" id="password" type="password" name="password" maxlength="20"
               placeholder="Введіть пароль" required>
        <button class="authorization-button" type="submit">Війти</button>
        <p>
            У вас немає аккаунта? - <a href="register">Зареєструйтесь!</a>
        </p>


<!--if (!empty($_SESSION['message'])) {-->
<!--    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';-->
<!--}-->
<!--       unset($_SESSION['message']);-->
<?php if (!empty($_SESSION['message'])) : ?>
        <p class="msg"> <?php Session::showMessage(); ?> </p>
<?php  endif; ?>
    </form>
</div>
