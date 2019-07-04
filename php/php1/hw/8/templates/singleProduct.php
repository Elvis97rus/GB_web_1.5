<div class="container">
       <div class="product">
            <img src="<?= $product['img_address'] ?>" alt="<?= $product['good_name'] ?>">
           <p><?= $product['good_name'] ?></p>
           <p><?= $product['good_description'] ?></p>
           <p>Цена: <?= $product['good_price'] ?>р.</p>
           <?php if ($product['is_active']==1):?>
               <p>Товар есть на складе</p>
           <?php else:?>
               <p>Ожидаем поступления</p>
           <?php endif ?>
           <form action="#" method="">
             <button type="submit" name="id_good" value="<?= $product['id_good'] ?>" class="mb-3 btn btn-primary">Положить в корзину</button>
           </form>
       </div>

</div>