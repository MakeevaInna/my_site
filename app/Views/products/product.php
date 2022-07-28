<?php if (!empty($content)) : ?>
    <div class="product-description">
        <div class="product-name">
            <h1><?= $content['title'] ?></h1>
        </div>
        <div class="product-brand">
            <h3>Бренд:<?= $content['brand'] ?> Артикул:<?= $content['code'] ?></h3>
        </div>
    </div>
    <div class="product">
        <div class="product-img">
            <img src="/<?= $content['img'] ?>" alt="Vitamin A"/>
        </div>
        <div class="shopping">
            <div class="buy">
                <h1 class="buy-h1"><?= $content['price'] ?>₴</h1>
                <form class="buy-form" action="/cart/add/<?= $content['code'] ?>">
                    <button class="buy-button" type="submit">Купити</button>
                </form>
                <form class="buy-fast-form">
                    <button class="buy-fast-button" type="submit">
                        Замовити швидко
                    </button>
                </form>
            </div>
            <div class="delivery">
                <table class="delivery-table">
                    <tr>
                        <th colspan="2" class="delivery-th">
                            <div class="delivery-div-th">
                                <img
                                        class="delivery-icon"
                                        src="/images/images-delivery-pay/truck.png"
                                        alt="truck"
                                />
                                <p>
                                    При замовленні від 1000₴ (для Укр пошти від 700₴)
                                    доставка безкоштовно!
                                </p>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td class="delivery-td1">
                            <div class="delivery-div-td">
                                <img
                                        class="delivery-icon-small"
                                        src="/images/images-delivery-pay/nova_poshta.jpg"
                                        alt="image nova poshta"
                                />НОВА ПОШТА
                            </div>
                        </td>
                        <td class="delivery-td2">від 45₴</td>
                    </tr>
                    <tr>
                        <td class="delivery-td1">
                            <div class="delivery-div-td">
                                <img
                                        class="delivery-icon-small"
                                        src="/images/images-delivery-pay/ukrposhta.jpg"
                                        alt="images ukrposhta"
                                />УКРПОШТА
                            </div>
                        </td>
                        <td class="delivery-td2">від 20₴</td>
                    </tr>
                    <tr>
                        <td class="delivery-td1">
                            <div class="delivery-div-td">
                                <img
                                        class="delivery-icon-small"
                                        src="/images/images-delivery-pay/justin.png"
                                        alt="images justin"
                                />ДЖАСТІН
                            </div>
                        </td>
                        <td class="delivery-td2">від 25₴</td>
                    </tr>
                    <tr>
                        <td class="delivery-td1">
                            <div class="delivery-div-td">
                                <img
                                        class="delivery-icon-small"
                                        src="/images/images-delivery-pay/meest.png"
                                        alt="images meest"
                                />МІСТ
                            </div>
                        </td>
                        <td class="delivery-td2">від 25₴</td>
                    </tr>
                </table>
            </div>
            <div class="pay"></div>
            <div class="pay-condition">
                <p>Oплата при отриманні або картою через сервіси</p>
                <img
                        class="pay-icon-small"
                        src="/images/images-delivery-pay/privat.png"
                        alt="images-delivery-pay/privat"
                />
                <img
                        class="pay-icon-small"
                        src="/images/images-delivery-pay/mono.jpeg"
                        alt="images-delivery-pay/mono"
                />
            </div>
        </div>
    </div>
    <hr/>
    <div class="description-text">
        <h1>Склад:</h1>
        <h4>
            <?= $content['composition'] ?>
        </h4>
        <h1>Опис:</h1>
        <p>
            <?= $content['description'] ?>
        </p>
        <h3>Рекомендації по застосуванню:</h3>
        <p>
            <?= $content['recommendations'] ?>
        </p>
        <h3>Попередження:</h3>
        <p>
            Якщо ви вагітні, годуєте грудьми, приймаєте будь-які ліки,
            плануєте якусь медичну або хірургічну процедуру або страждаєте
            яким-небудь захворюванням, проконсультуйтеся зі своїм лікарем,
            перш ніж приймати будь-які дієтичні добавки. У разі виникнення
            будь-яких побічних реакцій припиніть використання і
            проконсультуйтеся з лікарем. Зберігати в недоступному для дітей
            місці. Зберігати при кімнатній температурі. Не застосовувати
            препарат, якщо зовнішня захисна мембрана відсутня або пошкоджена.
        </p>
    </div>
<?php endif; ?>