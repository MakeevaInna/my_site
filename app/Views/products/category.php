<div class="products-category">
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

