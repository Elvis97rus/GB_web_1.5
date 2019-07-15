<?php
use App\models\User;
use App\services\BD;
include  dirname(__DIR__).DIRECTORY_SEPARATOR .
    'services'.DIRECTORY_SEPARATOR .'Autoload.php';
spl_autoload_register(
    [new Autoload(), 'loadClass']
);

//1. Создать несколько классов - наследников класса Model,
// используемые для сохранения данных из базы данных.
//2. Добавить для каждого класса неймспейс, соответствующий его месту в деректории.
// Каждый неймспейс должен начинаться с App
//3. Переписать автозагрусчик с учетом созданных пространств имен.

$user = new User(new BD());
