<?php
require_once "init.php";

function getAll($table, $orderBy='id_good'){
    $query = "SELECT * FROM {$table} order by {$orderBy} desc;";
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result){
        die(mysqli_error(myDB_connect()));
    }
    $n = mysqli_num_rows($result);
    $res = array();

    for ($i = 0; $i<$n;$i++){
        $row = mysqli_fetch_assoc($result);
        $res[] =$row;
    }
    return $res;
}
/**
 * @param $id
 * @param $table
 * @return array|null
 */
function getOne($id, $table){
    $query = sprintf("SELECT * FROM {$table} where id_good='%d'",(int)$id);
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result){
        die(mysqli_error(myDB_connect()));
    }
    $res = mysqli_fetch_assoc($result);;
    return $res;
}

function goodsDelete($id, $table){
    $id = (int)$id;

    if ($id == 0){
        return false;
    }
    $query = sprintf("SELECT * FROM {$table} where id_good='%d'",(int)$id);
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result){
        die(mysqli_error(myDB_connect()));
    }
    return mysqli_affected_rows(myDB_connect());
}

function newProduct($name,$description,$src,$price)
{
    $t = "INSERT into shop.goods (good_name,good_description,img_address,good_price) VALUES (%s,%s,%s,%s)";
    $query = sprintf($t, mysqli_real_escape_string(myDB_connect(), $name)
        , mysqli_real_escape_string(myDB_connect(), $description)
        , mysqli_real_escape_string(myDB_connect(), $src)
        , mysqli_real_escape_string(myDB_connect(), $price));
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result) {
        die(mysqli_error(myDB_connect()));
    }
    return true;
}

function goodsEdit($id, $name,$description,$src,$price){
    $id = (int)$id;
    $sql = "UPDATE shop.goods SET good_name='%s',good_description='%s',img_address='%s',good_price='%s' where id_good='%d'";
    $query = sprintf($sql, mysqli_real_escape_string(myDB_connect(), $name)
        , mysqli_real_escape_string(myDB_connect(), $description)
        , mysqli_real_escape_string(myDB_connect(), $src)
        , mysqli_real_escape_string(myDB_connect(), $price),
        mysqli_real_escape_string(myDB_connect(), $id));
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result) {
        die(mysqli_error(myDB_connect()));
    }
    return mysqli_affected_rows(myDB_connect());
}

