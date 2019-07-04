<?php
$product = [];
if ($id_product =$_GET['id_good']) {
    $product = getOne($id_product,'shop.goods');
}
else{
    header('location: /catalog.php');
}

