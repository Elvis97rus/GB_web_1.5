<?php
$count = 1;
if (isset($_POST['id'])){
    $id = $_POST['id'];
    if (isset($_SESSION['login']) && isset($_SESSION['pass'])){
        $login = $_SESSION['login'];
    }
    $good = getOne($id, 'goods');
    $_SESSION['basket']=1;

    $goodTemp = getOneTemp($id, 'temp_orders');
    if (isset($goodTemp)){
        $id=$goodTemp['id_good'];
        $count = $goodTemp['count'];
        $count++;
        editTempOrder($id, $count);
    }
    else{
        newTempOrder($id, $good['name'],$good['price'],$count);
    }
}