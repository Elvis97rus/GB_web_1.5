<?php
//$a=1;
//if (a>0){
//    echo "Больше нуля";
//}elseif (a*10%10 !=0){
//    echo "Дробное число";
//}else{
//    echo "меньше";
//}
// $a = 1;
//switch ($a){
//    case 1:
//        echo "Январь";
//        break;
//    case 2:
//        echo "Февраль";
//        break;
//    case 3:
//        echo "Март";
//        break;
//    case 4:
//        echo "Апрель";
//        break;
//    case 5:
//        echo "Май";
//        break;
//    case 6:
//        echo "Июнь";
//        break;
//    case 7:
//        echo "Июль";
//        break;
//    case 8:
//        echo "Август";
//        break;
//    case 9:
//        echo "Сентябрь";
//        break;
//    case 10:
//        echo "Октябрь";
//        break;
//    case 11:
//        echo "Ноябрь";
//        break;
//    case 12:
//        echo "Декабрь";
//        break;
//    default :
//        echo "Неверный формат";
//}
//const SPEED = 60;
//
//if(SPEED >60){
//    echo "Штраф выслан.";
//}else{
//    echo "OK!";
//}
//
//echo (SPEED > 60) ? ("Штраф выслан.") : ("OK!") ;
//$word ="Dot";
////echo (isset($word)) ? ("UNSET") : ("EXISTS") ;
//echo $word ?? ("UNSET") ;


//
//function test ($a){
//    echo $a.PHP_EOL;
//    if ($a==10)
//    {return;}
//    $a++;
//    test($a);
//}
//
//function factor($n){
//    echo $n.PHP_EOL;
//    if ($n == 1)
//        return 1;
//    return $n * factor($n - 1);
//}
//function factorNew($n){
//    if ($n > 1)
//        return $n * factorNew($n - 1);
//    return 1;
//}
function factorSuperNew($n){
    if ($n == 1) {
        echo "END".PHP_EOL;
        return 1;
    }

    global $temp;
    $temp *= $n;
    echo $temp.PHP_EOL;

    return $n * factorSuperNew($n - 1);
}
//
//echo factor(150);
echo factorSuperNew(5000);