<div class="checkout">
    <div class="title">
        ОФОРМЛЕННЯ ЗАМОВЛЕННЯ
        <p>Обрано товарів: <?= $totalQuantity ?>. Загальна вартість: <?= $totalPrice ?> грн</p>
    </div>
    <div class="cart-checkout">
        <form class="cart-checkout-form" id="cart-form" action="/checkout-successful" method="POST">
            <div class="">
                <div>
                    <label for="full_name">Прізвище та ім'я</label>
                </div>
                <div>
                    <input class="cart-checkout-input" id="full_name" type="text" name="full_name" maxlength="50"
                           value="<?= $userName ?>" placeholder="Введіть прізвище та ім'я" required>
                </div>
                <div>
                    <label for="phone">Номер телефону у форматі +380ХХХХХХХХХ</label>
                </div>
                <div>
                    <input class="cart-checkout-input" id="phone" type="tel" name="phone" value="<?= $userPhone ?>"
                           pattern="^\+380\d{9}$" title="Формат: +380ХХХХХХХХХ" placeholder="+380ХХХХХХХХХ"
                           required/>
                </div>
                <div>
                    <label for="email">Пошта</label>
                </div>
                <div>
                    <input class="cart-checkout-input" id="email" type="email" name="email"
                           value="<?= $userEmail ?>" maxlength="50" placeholder="Введіть адресу пошти" required>
                </div>
                <div>
                    <label for="comment">Коментар</label>
                </div>
                <div>
                    <input class="cart-checkout-input" id="comment" type="text" name="comment" maxlength="500"
                           placeholder="Якщо бажаєте, залиште коментар до замовлення">
                </div>
                <div>
                    <label for="cart-delivery" class="cart-label">Доставка</label>

                    <select class="cart-delivery-select" name="delivery">
                        <option value="ukrposhta">УКРПОШТА</option>
                        <option value="nova_poshta" selected>НОВА ПОШТА</option>
                        <option value="justin">ДЖАСТІН</option>
                        <option value="meest">МІСТ</option>
                    </select>
                    <label for="cart-pay" class="cart-label">Оплата</label>
                    <select class="cart-delivery-select" name="pay">
                        <option value="cash">Оплата при отриманні</option>
                        <option value="card" selected>Оплата на карту</option>
                        <option value="check">Оплата на розрахунковий рахунок</option>
                    </select>
                </div>
            </div>
            <div class="cart-checkout-btn">
                <button class="cart-btn" id="cart-button" type="submit" name="submit">Оформити замовлення</button>
            </div>
        </form>
    </div>
</div>
<script src="/scripts/disabledBtn.js"></script>
