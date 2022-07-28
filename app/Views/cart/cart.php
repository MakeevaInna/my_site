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
            <a href="/<?= $product['code']?>"><span class="description-title"><?= $product['title'] ?></span></a>
            <span class="description-brand"><?= $product['brand'] ?></span>
        </div>
<!--        <div class="quantity">--><?//= $productsInCart[$product['code']] ?><!--</div>-->
        <div class="quantity">
            <input type="number" min="1"  max="999" name="name" value="<?= $productsInCart[$product['code']] ?>">
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
            <form class="" action="">
                <button class="cart-btn" type="submit">Оформити замовлення</button>
            </form>
        </div>
    </div>
</div>
<?php else : ?>
<!--    <h1 class="products-list">-->
<!--        Ваш кошик порожній! <br>-->
<!--        <a href="/"> Обирайте тут </a> та повертайтеся!-->
<!--    </h1>-->
<div class="cart-message">
    <div class="message">
        На жаль, ваш кошик порожній! <a href="/">Обирайте тут</a> та повертайтеся!
    </div>
</div>
<?php endif; ?>