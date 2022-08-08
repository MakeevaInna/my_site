<?php if (!empty($content)) : ?>
    <div class="shopping-cart">

        <div class="title">
            КОШИК
        </div>
        <div class="cart-list">
            <?php foreach ($content as $product) : ?>
                <div class="item">
                    <div class="buttons"><a href="/cart/delete/<?= $product['code'] ?>">
                            <img id="delete-btn" src="/images/images-main/delete.png"
                                 alt="<?= $product['title'] ?>"></a>
                    </div>
                    <div class="image">
                        <a href="/<?= $product['code'] ?>"><img id="cart-image" src="/<?= $product['img'] ?>"
                                                                alt="<?= $product['title'] ?>"></a>
                    </div>
                    <div class="description">
                        <a href="/<?= $product['code'] ?>"><span
                                    class="description-title"><?= $product['title'] ?></span></a>
                        <span class="description-brand"><?= $product['brand'] ?></span>
                    </div>
                    <div class="quantity">
                        <div>
                            <form action="/cart/decrement/<?= $product['code'] ?>">
                                <button class="btn-dec" type="submit">-</button>
                            </form>
                        </div>
                        <div class="amount"><?= $productsInCart[$product['code']] ?></div>
                        <div>
                            <form action="/cart/increment/<?= $product['code'] ?>">
                                <button class="btn-inc" type="submit">+</button>
                            </form>
                        </div>
                    </div>
                    <div class="price"><?= $product['price'] ?> грн</div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="order-buy">
            <div class="sum">
                <div class="sum-w">ЗАГАЛЬНА ВАРТІСТЬ ТОВАРІВ:</div>
                <div class="sum-p"><?= $totalPrice ?> грн</div>
            </div>
            <div class="order">
                <form action="/">
                    <button class="cart-btn" type="submit">Продовжити покупки</button>
                </form>
                <form class="" action="/cart/checkout">
                    <button class="cart-btn" type="submit">Оформити замовлення</button>
                </form>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="cart-message">

        <h1>На жаль, ваш кошик порожній!</h1>
        <h2><a href="/">Обирайте тут</a> та повертайтеся!</h2>

    </div>
<?php endif; ?>

