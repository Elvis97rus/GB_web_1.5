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
        $login?newTempOrder($id, $good['name'],$good['price'],$count,$login):newTempOrder($id, $good['name'],$good['price'],$count);
    }
    echo "<a href='basket.php'><u>Show Goods</u></a>";
}
$goodTemp =getAll('temp_orders');

if (isset($_GET['action'])&&$_GET['action']=='clear'){
    unset($_SESSION['basket']);
    $query = sprintf("DELETE FROM temp_orders");
    $result = mysqli_query(myDB_connect(),$query);
    header('Location: index.php');
}
if (isset($_GET['action'])&&$_GET['action']=='order'){

}