<?php

include 'session.php';
//Задача 1:
// Создайте переменную $name и присвойте ей строковое значение содержащее ваше имя
// Создайте переменную $age и присвойте ей числовое значение
// Выведите: Меня зовут: "ваше имя"
// Выведите: Мой "ваш возраст" лет

function userData($name = "Nikita", $age = 19)
{
    //echo "Meня зовут : $name" . '</br>';
    echo "Мне $age лет";
}

//Задача 2:
//Создайте константу и присвойте ей значение
//Проверьте существует ли константа.
//Выведите значение константы
// Попытайтесь изменить ее значение.

function createConst()
{
    define('CONST_NAME', 1919);
    if (defined("CONST_NAME")) {
        echo "Constant: ";
        CONST_NAME;
    } else {
        echo 'Constant is not been found;';
    }
    echo CONST_NAME;

}

//Задача 3:
// Создайте переменную $age и присвойте ей значение
//- Напишите конструкцию if, которая выводит фразу:
// "Вам еще работать и работать" при условии что $age попадает в диапазон чисел от 18 до 59 (включительно)
//- Расширьте конструкцию if, выводя фразу: "Вам пора на пенсию" при условии, что $age больше 59
//- Если $age от 1 до 17 то выводите вам еще рано работать

function VerificationAge($age = 19)
{
    if (18 >= $age && $age <= 59) {
        echo 'Вам еще работать и работать';
    } elseif ($age > 59) {
        echo 'Вам пора на пенсию';
    } else {
        echo 'Отдохни пока есть время';
    }
}

//Задача 4:
// Создайте переменную $day и присвойте ей числовое значение
// С помощью конструкции switch выведите фразу "Это рабочий день если $day от 1-5
// Если 6-7 "Это выходной день"
// Если переменная $day не попадает в диапазон выводить неизвестный день

function VerificationDay($day = 7)
{
    switch ($day) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
            echo 'Это рабочий день';
            break;

        case 6:
        case 7:
            echo 'Это выходной день';
            break;
        default:
            echo 'День неизвестен';

    }
}

//Задача 5:
// Вывести все числа, меньшие 10000, у которых есть хотя бы одна цифра 3 и которые не делятся на 5

function number()
{
    $arrayNum = range(0, 1000);
    foreach ($arrayNum as $item) {
        if (strpos($item, '3') && ($item % 5) !== 0) {
            echo "$item, ";
        }
    }
}

//Задача 6:
// Использую куки выводите информацию о количестве посещений и дате последнего посещения.
    if (isset($_COOKIE['lastVisit'])) {
        echo 'Последний визит ' . $_COOKIE['lastVisit'] . '<br>';
    } else {
        echo 'Это ваш первый визит<br>';
    }
        echo "Количество посещений $a";

//Задача 7:
//Создайте в сессии массив для хранения всех посещенных страниц.
//Выведите в цикле список всех посещенных страниц.*/
var_dump($_SESSION);

//Задача 8:
// Создайте файл 'test.txt' и запишите в него массив ['name' => 'Your name', 'age' => 'Your age'].
// Считайте данные из файла 'test.txt' и выведите их на экран.

function fileWork (){
    $arrayUser = ['name' => 'Your name',
                  'age' => 'Your age' ];
    $filename = 'test.txt';
    file_put_contents($filename,serialize($arrayUser));
    var_dump(unserialize(file_get_contents($filename)));
}

//Задача 9:
// Даны два упорядоченных по возрастанию массива. Образовать из этих двух массивов единый упорядоченный по возрастанию массив.

function arrayStreamline (){
    $arrayFirst  = range(15,90,5);
    $arraySecond =  range (20, 40,2);
    $newArray    =  array_merge($arrayFirst,$arraySecond);
    var_dump($newArray);
}

//Задача 10:
//Написать функцию сортировки пузырьком, с возможностью доп. фильтрации результатов с помощью callback функции*/

$array = [2,5,6,3,-3,9,1,4,-4,19];

$bubble = bubbleSort($array , function ($items){
   $result = [];
   //массив с четными числами и больше и равно нуля.
   foreach ($items as $value ){
       if ($value %2 == 0 && $value >= 0){
           $result[] = $value;
       }
   }
    return $result;
});

function bubbleSort (array  $array , callable  $callback = NULL){
    $result = [];
    // bubble sort
    for ($j = 0; $j < count($array) - 1; $j++){
        for ($i = 0; $i < count($array) - $j - 1; $i++){
            // если текущий элемент больше следующего
            if ($array[$i] > $array[$i + 1]){
                // меняем местами элементы
                $tmp_var = $array[$i + 1];
                $array[$i + 1] = $array[$i];
                $array[$i] = $tmp_var;
                $result = $array;
            }
        }
    }
    if ($callback){
        $result = call_user_func($callback,$result);
    }
    return $result;
}

?>