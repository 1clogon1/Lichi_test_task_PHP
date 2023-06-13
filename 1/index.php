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
    $array = [
        [399, 9160, 144, 3230, 407, 8875, 1597, 9835],
        [2093, 3279, 21, 9038, 918, 9238, 2592, 7467],
        [3531, 1597, 3225, 153, 9970, 2937, 8, 807],
        [7010, 662, 6005, 4181, 3, 4606, 5, 3980],
        [6367, 2098, 89, 13, 337, 9196, 9950, 5424],
        [7204, 9393, 7149, 8, 89, 6765, 8579, 55],
        [1597, 4360, 8625, 34, 4409, 8034, 2584, 2],
        [920, 3172, 2400, 2326, 3413, 4756, 6453, 8],
        [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]
    ];


//Функция определения чисел Фибоначчи
  function lookFib($fib) {
        $arrFib = array(0, 1);

        //Проверка, если число больше, то...
        while ($fib > $arrFib[count($arrFib) - 1]) {
            //Складываем длину массива
            $count = count($arrFib);

            //Добавляем следующее число в массив, это сумма двух предыдущих
            $arrFib[$count] = $arrFib[$count - 1] + $arrFib[$count - 2];
        }
        //Если такое число есть в данном массиве, то возврощаем true
        return in_array($fib, $arrFib);
        //echo count($arrFib);
    }


    //Сумма чисел
    $sumFib = 0;

  //Считаем сумму чисел
    foreach ($array as $number)
    {
        //Проходимся по одной строчке
        foreach ($number as $user)
        {
            //Если такое число есть, то сумируем его
            if(lookFib($user)){
                $sumFib +=$user;
            }
        }
    }
    //Результат
    echo $sumFib;

?>
</body>
</html>