<div class="admin-cont">
    <div class="admin-menu">
        <button type="button" class="ml-3 mb-3 btn btn-primary" data-toggle="modal" data-target="#addProduct">
            Add product
        </button>
        <form enctype="multipart/form-data" action = "/engine/imgUpload.php" method = "POST">
            <p><strong>Upload Image</strong></p>
            <input name="userFile" type="file" required><br>
            <input type="submit" value="Upload">
        </form>
    </div>
    <div>
        <h1>Admin page</h1>
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


                    <form action = "/engine/productU-D.php" method = "POST">
                        <button type="submit" name="id_good_update" value="<?= $good['id_good'] ?>" class="mb-3 btn btn-primary">Изменить</button>
                        <button type="submit" name="id_good_delete" value="<?= $good['id_good'] ?>" class="mb-3 btn btn-primary">Удалить</button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
