<?php if (!empty($content)) : ?>
<div class="shopping-cart">

    <div class="title">
        КОШИК
    </div>
    <div class="cart-list">
    <?php foreach ($content as $product) : ?>
    <div class="item">
        <div class="buttons">
            <a href="/cart/delete/<?= $product['code']?>"><img id="delete-btn" src="/images/images-main/delete.png"
                                                               alt="" /></a>
        </div>
        <div class="image">
            <a href="/<?= $product['code']?>"><img id="cart-image" src="/<?= $product['img'] ?>"
                                                   alt="<?= $product['title'] ?>"></a>
        </div>
        <div class="description">
            <a href="/<?= $product['code']?>"><span><?= $product['title'] ?></span></a>
            <span><?= $product['brand'] ?></span>
        </div>
        <div class="quantity"><?= $productsInCart[$product['code']] ?></div>
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
            <form class="" action="">
                <button class="cart-btn" type="submit">Оформити замовлення</button>
            </form>
        </div>
    </div>

</div>
<?php endif; ?>