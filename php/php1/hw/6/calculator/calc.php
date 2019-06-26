<?php
include 'functions.php';

$arg1 = $_POST['ch1'];
$arg2 = $_POST['ch2'];


$operation=$_POST['calculate'];
if ($_POST)
{
   $result = mathOperation($arg1, $arg2, $operation);
}
else{
    $result = 'Введите корректные данные';
}
?>
<form action = "calc.php" method = "post">
    <input type = "text" name = "ch1">
    <select name="calculate">
        <option value = "plus">+</option>
        <option value = "minus">-</option>
        <option value = "divide">/</option>
        <option value = "multiply">*</option>
    </select>
    <input type = "text" name = "ch2">
    <input type = "submit" value = "Считать">
</form>
<p>Ответ: <?=$result;?></p>

<form action = "calc.php" method = "post">
    <input type = "text" name = "ch1" placeholder="Первое число">
    <input type = "text" name = "ch2" placeholder="Второе число">
    <div>
        <input type="submit" name="calculate" value = "plus">
        <input type="submit" name="calculate" value = "minus">
        <input type="submit" name="calculate" value = "divide">
        <input type="submit" name="calculate" value = "multiply">
    </div>
</form>
<p>Ответ: <?=$result;?></p>