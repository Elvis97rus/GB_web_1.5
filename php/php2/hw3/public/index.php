<?php
use  \App\models\Good;
use  \App\models\User;
use  \App\models\Model;
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
echo '<hr>';
$user1 = new User();
$user1->setName('NewMan');
$user1->setLogin('someoneNew');
$user1->setPassword('someone');
$user1->save();
echo '<hr>';
//$user2 = $user1->getOne(2);
//var_dump($user2);
//$user2->deleteOne();

//
//3. Реализовать CRUD.
//4. Объединить методы update и insert в метод save.



