<?php

class Autoload
{
    private $dir=[
        'models','services'
    ];
    public function loadClass($className){

        $file = str_replace(['App', '\\'], ['', '/'], $className);

        include dirname(__DIR__) .DIRECTORY_SEPARATOR. $file . '.php';

    }
}