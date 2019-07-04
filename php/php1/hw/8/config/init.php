<?php
define('ROOT_DIR', __DIR__);

function myDB_connect () {

	$defaultConfig = require __DIR__.'/db_configs/config.default.php';

	if (!file_exists( __DIR__.'/db_configs/config.php')) {
		echo 'Создайте файл конфигурации';

		$localConfig = [];
	} else {
		$localConfig = require __DIR__ . '/db_configs/config.php';
	}

	$config = array_merge($defaultConfig, $localConfig);

		$mysqli = mysqli_connect(
		$config['db_host'],
		$config['db_user'],
		$config['db_pass'],
		$config['db_name']

	);

	return $mysqli;
}


myDB_connect();