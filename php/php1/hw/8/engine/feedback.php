<?php

$query = "SELECT * FROM shop.feedback;";


$result = mysqli_query(myDB_connect(), $query);

$feedback = [];
while ($row = mysqli_fetch_assoc($result)) {
    $feedback[] = $row;
}

