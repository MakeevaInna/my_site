<div class="checkout">
    <div class="title">
        ОФОРМЛЕННЯ ЗАМОВЛЕННЯ
        <p>Обрано товарів: <?= $totalQuantity ?>. Загальна вартість: <?= $totalPrice ?> грн</p>
    </div>
    <div class="cart-checkout">
        <form class="cart-checkout-form" id="cart-form" action="/checkout-fast-successful" method="POST">
            <div class="">
                <div>
                    <label for="name">Ім'я</label>
                </div>
                <div>
                    <input class="cart-checkout-input" id="name" type="text" name="name" maxlength="50"
                           value="<?= $userName ?>" placeholder="Введіть ім'я" required>
                </div>
                <div>
                    <label for="phone">Номер телефону у форматі +380ХХХХХХХХХ</label>
                </div>
                <div>
                    <input class="cart-checkout-input" id="phone" type="tel" name="phone" value="<?= $userPhone ?>"
                           pattern="^\+380\d{9}$" title="Формат: +380ХХХХХХХХХ" placeholder="+380ХХХХХХХХХ"
                           required/>
                </div>
            </div>
            <div class="cart-checkout-btn">
                <button class="cart-btn" id="cart-button" type="submit" name="submit">Оформити замовлення</button>
            </div>
        </form>
    </div>
</div>
<script src="/scripts/disabledBtn.js"></script>
