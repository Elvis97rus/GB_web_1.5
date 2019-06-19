<?php

$query = "SELECT * FROM php1.foto ORDER BY `like-number` ASC ;";

$result = mysqli_query(myDB_connect(), $query);

$gallery = [];
while ($row = mysqli_fetch_assoc($result)) {
	$gallery[] = $row;
}

