<?php
include 'functions.php';

$arg1 = $_POST['ch1'];
$arg2 = $_POST['ch2'];


$operation=$_POST['calculate'];
if ($_POST)
{
   $result = mathOperation($arg1, $arg2, $operation);
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
