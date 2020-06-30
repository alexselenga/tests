<?php

const ARR_LENGTH = 10000;
const RND_MIN = 1;
const RND_MAX = 1000000;

$valuesByPos = new SplFixedArray(RND_MAX + 1); //Массив для поиска. Для быстродействия используются не значения, а ключи
$arr = new SplFixedArray(ARR_LENGTH); //Массив с уникальными числами

//Генерация массива $arr с уникальными числами
for ($iArr = 0; $iArr < ARR_LENGTH; $iArr++) {
    do {
       $num = random_int(RND_MIN, RND_MAX);
    } while ($valuesByPos->offsetExists($num));

    $valuesByPos[$num] = true;
    $arr[$iArr] = $num;
}

//Два разных ключа для $arr
$iArr1 = random_int(0, ARR_LENGTH - 1);

do {
    $iArr2 = random_int(0, ARR_LENGTH - 1);
} while ($iArr1 == $iArr2);

//Создание одного дубликата числа в $arr
$arr[$iArr1] = $arr[$iArr2];

//var_dump($arr);
//echo "$iArr1, $iArr2<br>";

//Поиск числа - дубликата в $arr
$dupNum = null;
$valuesByPos = new SplFixedArray(RND_MAX + 1); //Позволяем сборщику мусора убрать прежний $valuesByPos

for ($iArr = 0; $iArr < ARR_LENGTH; $iArr++) {
    $num = $arr[$iArr];

    if ($valuesByPos->offsetExists($num)) {
        $dupNum = $num;
        break;
    }

    $valuesByPos[$num] = true;
}

echo 'Дубликат: ' . $dupNum; //Результат
