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

<form action="" method="POST">
    <input type="submit" value="aaaaa" name="click">
</form>


<?php

    include 'tests.php';

    //Подключаемся к базе
    $localhost = "localhost";
    $user = "clogon";
    $password = "AAaasdfg123";
    $dbname = "test";
    //$dbh = new PDO("mysql:dbname=test;host=db", "root", "testPassword");

    $query = mysqli_connect($localhost,$user,$password,$dbname);


    if (mysqli_connect_errno()) {
        echo "Подключение невозможно: ".mysqli_connect_error();
    }
//$query->query('INSERT INTO tests (script_name,start_time,end_time,result) VALUES ({$script_name},rand(1, 10), rand(1, 10),{$result})');

//Создаем экземпляр класса
$tests = new tests($query);

    //Вызываем функцию вывод аданных
$tests->get();



?>
</body>
</html>