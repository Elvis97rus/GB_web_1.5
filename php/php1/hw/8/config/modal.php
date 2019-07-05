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


function imgUpload($tmp_path,$types, $path,  $size){
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!in_array($_FILES['picture']['type'], $types))
            die('<p>Запрещённый тип файла. <a href="/admin.php">Попробовать другой файл?</a></p>');

        if ($_FILES['picture']['size'] > $size)
            die('<p>Слишком большой размер файла. <a href="/admin.php">Попробовать другой файл?</a></p>');

        function resize($file, $type = 1, $rotate = null, $quality = null)
        {
            global $tmp_path;

            $max_thumb_size = 200;
            $max_size = 600;

            if ($quality == null)
                $quality = 75;

            if ($file['type'] == 'image/jpeg')
                $source = imagecreatefromjpeg($file['tmp_name']);
            elseif ($file['type'] == 'image/png')
                $source = imagecreatefrompng($file['tmp_name']);
            elseif ($file['type'] == 'image/gif')
                $source = imagecreatefromgif($file['tmp_name']);
            else
                return false;

            if ($rotate != null)
                $src = imagerotate($source, $rotate, 0);
            else
                $src = $source;

            $w_src = imagesx($src);
            $h_src = imagesy($src);

            if ($type == 1)
                $w = $max_thumb_size;
            elseif ($type == 2)
                $w = $max_size;

            if ($w_src > $w)
            {
                $ratio = $w_src/$w;
                $w_dest = round($w_src/$ratio);
                $h_dest = round($h_src/$ratio);

                $dest = imagecreatetruecolor($w_dest, $h_dest);

                imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);

                imagejpeg($dest, $tmp_path . $file['name'], $quality);
                imagedestroy($dest);
                imagedestroy($src);

                return $file['name'];
            }
            else
            {
                imagejpeg($src, $tmp_path . $file['name'], $quality);
                imagedestroy($src);

                return $file['name'];
            }
        }
        $name = resize($_FILES['picture'], $_POST['file_type'], $_POST['file_rotate']);

        // Загрузка файла и вывод сообщения
        if (!@copy($tmp_path . $name, $path . $name))
            echo '<p>Что-то пошло не так.</p>';
        else
            echo '<p>Загрузка прошла удачно <a href="' . $path . $_FILES['picture']['name'] . '">Посмотреть</a>.<a href="/admin.php"> Обратно</a>.</p>';

        // Удаляем временный файл
        unlink($tmp_path . $name);
    }
}

function newUser($login,$email, $pass){
    $t = "INSERT into shop.users (login,email, pass) VALUES (%s,%s,%s)";
    $query = sprintf($t, mysqli_real_escape_string(myDB_connect(), $login)
        , mysqli_real_escape_string(myDB_connect(), $email)
        , mysqli_real_escape_string(myDB_connect(), $pass));
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result) {
        die(mysqli_error(myDB_connect()));
    }
    return true;
}

function newTempOrder($id_good,$good_name,$good_price,$good_count,$login=null){
    $t = "INSERT into shop.temp_orders (id_good,good_name,good_price,good_count,login) VALUES (%s,%s,%s,%s,%s)";
    $query = sprintf($t, mysqli_real_escape_string(myDB_connect(), $id_good)
        , mysqli_real_escape_string(myDB_connect(), $good_name)
        , mysqli_real_escape_string(myDB_connect(), $good_price)
        , mysqli_real_escape_string(myDB_connect(), $good_count)
        , mysqli_real_escape_string(myDB_connect(), $login)
    );
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result) {
        die(mysqli_error(myDB_connect()));
    }
    return true;
}

function editTempOrder($id,$count){
    $id=(int)$id;
    $sql = "UPDATE temp_orders SET count='%d' WHERE id_good='%d'";
    $query = sprintf($sql, mysqli_real_escape_string(myDB_connect(), $count),$id);
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result) {
        die(mysqli_error(myDB_connect()));
    }
    return true;
}


function getOneTemp($id, $table){
    $query = sprintf("SELECT * FROM {$table} where id_good='%d'",(int)$id);
    $result = mysqli_query(myDB_connect(), $query);

    if (!$result){
        die(mysqli_error(myDB_connect()));
    }
    $res = mysqli_fetch_assoc($result);;
    return $res;
}
