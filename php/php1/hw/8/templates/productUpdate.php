<div>
    <form enctype="multipart/form-data" action="../engine/addProductModal.php" method="post">
    <input name="id_good" value="<?=$product['id_good']?>" type="hidden">
    <input name="good_name" type="text" class="m-3 form-control" placeholder="Название товара" value="<?=$product['good_name']?>">
<input name="good_description" class="m-3 form-control" placeholder="Описание товара"  value="<?=$product['good_description']?>"></input>
<input name="good_price" type="text" class="m-3 form-control" placeholder="Цена к отображению" value="<?=$product['good_price']?>">
<input name="is_active" type="text" class="m-3 form-control" placeholder="В наличии?(0/1)" value="<?=$product['is_active']?>">
Укажите адрес расположения картинки на сервере (/public/img/имя_файла.расширение)
<input name="img_address" type="text" class="m-3 form-control" placeholder="Папка с картинкой" value="<?=$product['img_address']?>">
        <button  name="id_good_update" class="btn btn-primary " type="submit">Обновить товар</button>
    </form>
</div>