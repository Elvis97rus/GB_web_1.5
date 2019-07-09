<div class="container">
    <?php foreach ($goods as $good): ?>
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
               <a href="#" onclick="item(<?=$good['id_good']?>)" class="mb-3 btn btn-primary">Добавить в корзину</a>
       </div>
    <?php endforeach ?>
</div>