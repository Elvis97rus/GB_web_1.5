<?php
include './../engine/autoload.php';
autoload('./../config');

if ($_POST['id_good_update']&&!$_POST['id_good_delete']){
    $id_good = $_POST['id_good_update'];
    $query = "SELECT * FROM shop.goods where id_good='$id_good';";

    $result = mysqli_query(myDB_connect(), $query);
    $product = mysqli_fetch_assoc($result);
    include '../templates/productUpdate.php';
}else{
    $id_good = $_POST['id_good_delete'];
    $query = "DELETE FROM shop.goods where id_good='$id_good';";

    $result = mysqli_query(myDB_connect(), $query);

    header('Location: /admin.php');
    die;
}