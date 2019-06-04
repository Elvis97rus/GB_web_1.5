<?php
$h1= 'Данная страница генерировалась через PHP';
$title = 'Урок 1. Введение в PHP';
$currentYear = getdate()['year'];
?>

<title><?php echo $title?></title>

<h1><?php echo $h1?></h1>

<time>Year: <?php echo $currentYear?></time>

<hr>

    $a = 5;
    $b = '05';<br>
    var_dump($a == $b);                             // Почему true?  <br>
<p>При сравнении строка превращается в число, значения переменной становятся равны, но не типы. "==" проверка на значение</p>
<hr>
    var_dump((int)'012345');                        // Почему 12345?<br>
    <p>(int) - предписание строке читаться как число, по сути преобразование строки в целочисленное.</p>
<hr>
    var_dump((float)123.0 === (int)123.0); // Почему false?<br>
    <p>"===" - проверка на идентичность (значение + тип данных). дробный тип не является целочисленным и наоборот</p>
<hr>
    var_dump((int)0 === (int)'hello, world'); // Почему true?<br>
    <p>преобразование текста в число даст 0, по типу сравниваемое идентично, по значению тоже</p>
<hr>


<p>5. *Используя только две переменные, поменяйте их значение местами.
    Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2.
    Дополнительные переменные использовать нельзя.</p>
<?php
$firstNum = 1;
$secondNum = 2;

$firstNum += $secondNum; //3
$secondNum = $firstNum - $secondNum; //1
$firstNum -= $secondNum; //2
?>