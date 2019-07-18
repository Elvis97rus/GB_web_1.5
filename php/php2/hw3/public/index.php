<?php
use  \App\models\Good;
use  \App\models\User;
use  \App\services\BD;

include $_SERVER['DOCUMENT_ROOT'] .
    '/../services/Autoload.php';

spl_autoload_register(
    [new Autoload(),
        'loadClass']
);

$user = new Good();
var_dump($user->getOne(4));
echo '<hr>';
var_dump($user);

//$user->getProperties();

//
//3. Реализовать CRUD.
//4. Объединить методы update и insert в метод save.



