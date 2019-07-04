<?php
include './../engine/autoload.php';
autoload('./../config');

if ($_POST['good_name'] && $_POST['good_description']&& $_POST['good_price']
    && $_POST['img_address']) {
    $id = $_POST['id_good'];
    $good_name = $_POST['good_name'];
    $good_description = $_POST['good_description'];
    $good_price = $_POST['good_price'];
    $is_active = $_POST['is_active'];
    $img_address = $_POST['img_address'];

    if ($_POST['id_good']){
        goodsEdit($id,$good_name,$good_description,$img_address,$good_price );
    }else {
        $INSERT_query = sprintf("INSERT INTO shop.goods (good_name,good_description,good_price,is_active,img_address) 
    VALUES (\"%s\", \"%s\", \"%s\", \"%s\", \"%s\")", $good_name, $good_description, $good_price, $is_active, $img_address);

        $insert_query = mysqli_query(myDB_connect(), $INSERT_query);
    }
    if ($_FILES){
    $uploaddir = 'public/img/';
    $uploadfile = $uploaddir . basename($_FILES['picture']['name']);

    move_uploaded_file($_FILES['picture']['name'], $uploadfile);}
}


header('Location: /admin.php');

die;
