<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lichi - 1</title>
</head>
<body>
<?php

//Функция проверки чисел
function lookThree($number) {

    //Полученное число помешаем в массив
    $numberArr = str_split($number);

    $YesNo = 0;

    for($i=1; $i<count($numberArr); $i++) {
        //Проверяем число равно предыдущему числу +1
        if ($numberArr[$i] == ($numberArr[$i - 1] + 1)){
            //Подтверждаем если да
            $YesNo++;
        }
        else{
            //Сбрасываем если нет
            $YesNo = 0;
        }
    }
//Подтверждение, что числа идут лесенкой
    return $YesNo > 1;
}

$sumThree = 0;
//Цикл для прохода по всем числам
for ($i=1; $i<=10000; $i++) {
    if (lookThree($i)){
        $sumThree += $i;
    }
}

//Результат
echo $sumThree;


?>
</body>
</html>