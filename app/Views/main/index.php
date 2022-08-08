<div class="sale">
    <a href="#"><img src="/images/images-main/sale.png" alt="Sale"/></a>
</div>
<div class="products">
    <div class="vitamins">
        <a href="/vitamins"><img src="/images/images-main/vitamins.jpeg" alt="Vitamins"/></a>
        <a href="/vitamins"><h2>Вітаміни</h2></a>
        <ul>
            <li><a href="/vitamins/vitaminA">Вітамін A</a></li>
            <li><a href="/vitamins/vitaminE">Вітамін Є</a></li>
            <li><a href="/vitamins/vitaminD">Вітамін D</a></li>

        </ul>
    </div>
    <div class="minerals">
        <a href="/minerals"><img src="/images/images-main/minerals.jpeg" alt="Minerals"/></a>
        <a href="/minerals"><h2>Mінерали</h2></a>
        <ul>
            <li><a href="/minerals/magnesium">Магній</a></li>
            <li><a href="/minerals/potassium">Калій</a></li>
            <li><a href="/minerals/zinc">Цинк</a></li>
        </ul>
    </div>
    <div class="other">
        <a href="#"><img src="/images/images-main/other.png" alt="Other"/></a>
        <a href="#"><h2>Інші добавки</h2></a>
        <ul>
            <li><a href="#">Ашваганда</a></li>
            <li><a href="#">Колаген</a></li>
            <li><a href="#">Риб'ячий жир</a></li>
        </ul>
    </div>
</div>
<div class="new-products-h2">
    <h2>Новинки</h2>
</div>
<div class="new-products">
    <?php if (!empty($content)) : ?>
        <?php foreach ($content as $product) : ?>
            <div class="products-category-1">
                <a href="/<?= $product['code'] ?>"><img src="/<?= $product['img'] ?>"
                                                        alt="<?= $product['title'] ?>"></a>
                <a href="/<?= $product['code'] ?>"><h5><?= $product['title'] ?></h5></a>
                <p><?= $product['price'] ?> грн.</p>
                <a href="/cart/add/<?= $product['code'] ?>" data-id="<?= $product['code'] ?>">Купити
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<div class="products-all">
    <a href="/all-products"><h2>Переглянути усі товари</h2></a>
</div>
