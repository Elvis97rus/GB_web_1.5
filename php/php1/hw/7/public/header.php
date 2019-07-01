<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="public/css/style.css" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="/index.php">Home</a></li>
        <li><a href="/catalog.php">Catalog</a></li>
        <li><a href="/admin.php">Admin</a></li>
        <li><a href="#">Feedback</a></li>
    </ul>
</nav>
<div class="container">
    <h1>Здравствуй, <?=($username)?$username:"Гость"?> </h1>
    <form action = "/login.php" method = "POST">
    <? if ($username): ?>
        <button type="submit" name="auth_off" value="<? ?>" class="mb-3 btn btn-primary">Выход</button>
    <? else: ?>
        <button type="submit" name="auth_on" value="<? ?>" class="mb-3 btn btn-primary">Авторизация</button>
    <? endif;?>
    </form>
</div>