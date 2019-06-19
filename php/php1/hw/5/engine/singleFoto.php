<?php

$currentFoto = $_GET['name'];
$query = "UPDATE foto SET `like-number`=`like-number`+1 WHERE NAME = '$currentFoto' ;";
$result = mysqli_query(myDB_connect(), $query);

$query = "SELECT * FROM php1.foto WHERE NAME = '$currentFoto' ;";
$result = mysqli_query(myDB_connect(), $query);

$row = mysqli_fetch_assoc($result);

$fotoName = explode('.',$row['name'])[0];;
