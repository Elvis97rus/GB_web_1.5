<?php

if ($_POST['id_good']) {
    $id_product = $_POST['id_good'];
$query = sprintf("SELECT * FROM shop.goods WHERE id_good='$id_product'");
$result = mysqli_query(myDB_connect(), $query);
}
$product = mysqli_fetch_assoc($result);

