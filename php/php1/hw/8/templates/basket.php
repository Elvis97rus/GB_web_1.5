<div class="container">
    <h1>Basket</h1>
    <?php if(isset($goodsTemp)): ?>
    <?$i=0;$price_res=0;$count_res=0;?>
    <?php foreach ($goodsTemp as $good): ?>
        <div class="single-product">
            <img src="<?= $good['img_address'] ?>" alt="<?= $good['good_name'] ?>">
            <p><?= $good['good_name'] ?></p>
            <p><?= $good['good_description'] ?></p>
            <p>Цена: <?= $good['good_price'] ?>р.</p>
            <?php if ($good['is_active']==1):?>
                <p>Товар есть на складе</p>
            <?php else:?>
                <p>Ожидаем поступления</p>
            <?php endif ?>
            <a href="single-product.php?id_good=<?= $good['id_good'] ?>" class="mb-3 btn btn-primary">Подробнее</a>
        </div>
            <?$i++;?>
            <?$price_res += $good['good_price']?>
            <?$count_res += $good['good_count']?>
    <?php endforeach ?>
    <p>Количество наименований: <?=$i?> </p>
    <p>Общая сумма: <?=$price_res*$count_res?> </p>
        <?php if (isset($_SESSION['login'])&&isset($_SESSION['pass'])): ?>

            <p><a href="basket.php?action=order">Make Order</a> </p>
        <?php else: ?>

            <p><a href="reg.php">Login please...</a> </p>
        <?endif;?>

        <p><a href="basket.php?action=clear">Clear temp order</a> </p>
    <?endif;?>
</div>