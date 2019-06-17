<?php
include 'config\config.php';
//1.	Создать галерею фотографий. Она должна состоять из одной страницы,
// на которой пользователь видит все картинки в уменьшенном виде.
// При клике на фотографию она должна открыться в браузере в новой вкладке.
// Размер картинок можно ограничивать с помощью свойства width.
//2.	*Строить фотогалерею, не указывая статичные ссылки к файлам,
// а просто передавая в функцию построения адрес папки с изображениями.
// Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
//3.	*[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать
// полноразмерное изображение в модальном окне
// (материал в помощь: http://dontforget.pro/javascript/prostoe-modalnoe-okno-na-jquery-i-css-bez-plaginov/)
$files1 = scandir(__DIR__.SLASH.IMG_ROOT);

//?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public_html/js/jquery-2.1.0.min.js"></script>
    <script src="public_html/js/imagelightbox.js"></script>
    <link rel="stylesheet" href="<?=CSS_ROOT?>/style.css">
    <title>Gallery</title>
</head>
<body>
    <div id="lightgallery">
    <?php foreach ($files1 as $item) :?>
    <?php if ($item!=='.'&&$item!=='..'):?>
        <a class="swipebox" href="<?=IMG_ROOT.'/'.$item?>">
            <img src="<?=IMG_ROOT.'/'.$item?>" alt="">
        </a>
    <?php endif?>
    <?php endforeach;?>
    </div>

<script type="text/javascript">
    $( function()
    {
        $( 'a' ).imageLightbox();
    });
</script>
</body>
</html>
