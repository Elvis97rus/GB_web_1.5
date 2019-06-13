<?php
//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
//const MAXNUM = 100;
//$counter = 0;
//while($counter<MAXNUM){
//    if ($counter%3==0)
//        echo $counter++.PHP_EOL ;
//    else {
//        $counter++;
//        continue;
//    }
//}
//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
//0 – ноль.
//1 – нечетное число.
//2 – четное число.
//3 – нечетное число.
//…
//10 – четное число.
//const MAXNUM = 10;
//$counter = 0;
//do{
//    if (!$counter)
//        $text=' - ноль.';
//    elseif ($counter%2==0)
//        $text =' - четное число.';
//    else
//        $text =' - нечетное число.';
//    echo $counter.$text.PHP_EOL;
//}while($counter++<MAXNUM);

//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей,
// а в качестве значений – массивы с названиями городов из соответствующей области.
// Вывести в цикле значения массива, чтобы результат был таким:
//Московская область:
//Москва, Зеленоград, Клин
//Ленинградская область:
//Санкт-Петербург, Всеволожск, Павловск, Кронштадт
//Рязанская область … (названия городов можно найти на maps.yandex.ru)
$cityAreaArr =[
    'Московская область' =>	['Москва', 	'Балашиха', 'Бронницы'],
    'Брянская область' =>	['Брянск', 	'Клинцы'],
    'Курская область' =>	['Железногорск', 'Курск', 'Курчатов'],
];
foreach ($cityAreaArr as $zone => $city){
    $zoneItemsCount = count($city);
    echo $zone.PHP_EOL;
    for ($i = 0; $i < $zoneItemsCount; $i++) {
        echo ($i<$zoneItemsCount-1)?$city[$i].", ": $city[$i].PHP_EOL;
    }
};

//4. Объявить массив, индексами которого являются буквы русского языка,
// а значениями – соответствующие латинские буквосочетания
// (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.

//$exampleText = 'транслитерации латинские буквосочетания';
//function translate($string){
//    $alphabet = [
//       'а' => 'a',   'б' => 'b',   'в' => 'v',
//        'г' => 'g',   'д' => 'd',   'е' => 'e',
//        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
//        'и' => 'i',   'й' => 'y',   'к' => 'k',
//        'л' => 'l',   'м' => 'm',   'н' => 'n',
//        'о' => 'o',   'п' => 'p',   'р' => 'r',
//        'с' => 's',   'т' => 't',   'у' => 'u',
//        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
//        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
//        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
//        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
//        ' ' => '_',
//        'А' => 'A',   'Б' => 'B',   'В' => 'V',
//        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
//        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
//        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
//        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
//        'О' => 'O',   'П' => 'P',   'Р' => 'R',
//        'С' => 'S',   'Т' => 'T',   'У' => 'U',
//        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
//        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
//        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
//        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
//    ];
//    return strtr($str, $alphabet);
//}
//echo translate($exampleText);

//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
//function stringChange($string){
//    return implode('_',explode(' ',$string));
//}
//echo stringChange('В имеющемся шаблоне сайта заменить');

//6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
// Необходимо представить пункты меню как элементы массива и вывести их циклом.
// Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <!-- Необходимые Мета-теги всегда на первом месте -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    </head>
<body>
<div class="dropdown open">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Области
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <ul>
        <?php foreach ($cityAreaArr as $key => $value) :?>
            <li><a class="dropdown-item" href="#"><?=$key?></a></li>
            <ul>
            <?php foreach ($value as $item) :?>
                <li><a class="dropdown-item" href="#"><?=$item?></a></li>
            <?php endforeach;?>
            </ul>
        <?php endforeach;?>
        </ul>

    </div>
</div>
<!-- jQuery первый, затем Tether, затем Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
</body>
</html>
<?php
//7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
//for (…){ // здесь пусто}

//for($i =0; $i<10;print_r($i++)){}

//8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».
function selectCity($letter){
    $cityAreaArr =[
        'Московская область' =>	["Москва", 	"Калашиха", "Бронницы"],
        'Брянская область' =>	['Брянск', 	'Клинцы'],
        'Курская область' =>	['Железногорск', 'Курск', 'Курчатов'],
    ];
    foreach ($cityAreaArr as $zone => $city){
        $zoneItemsCount = count($city);
        echo $zone.PHP_EOL;
        for ($i = 0; $i < $zoneItemsCount; $i++) {
            echo $city[$i]{0};
            if($city[$i]{0}==$letter)
                echo $city[$i]." ";
        } echo PHP_EOL;
    };
}
//selectCity("К");
//9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
// производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при
// конструировании url-адресов на основе названия статьи в блогах).
//
function transliterate($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        ' ' => '_',
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

    );
    return strtr($string, $converter);
}

//echo transliterate('транслитерацию и замену пробелов');