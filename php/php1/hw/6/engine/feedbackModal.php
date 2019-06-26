<?php

include './../engine/autoload.php';
autoload('./../config');

if ($_POST['feedback_user'] && $_POST['feedback_body']) {
    $feedback_user = $_POST['feedback_user'];
    $feedback_body = $_POST['feedback_body'];


    $INSERT_query = sprintf("INSERT INTO shop.feedback (feedback_user, feedback_body) VALUES (\"%s\", \"%s\")",$feedback_user, $feedback_body);

    $insert_query = mysqli_query(myDB_connect(), $INSERT_query);

}

header('Location: /index.php');

die;