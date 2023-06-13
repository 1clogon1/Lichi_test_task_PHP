<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<body>
<style>
    .container div {
        float: left;
        margin-bottom: 15px;
    }

    .col-1-3 {
        width: 15%;
    }

    .col-2-3 {
        width: 85%;
    }
</style>

<div>
    <button type='submit' onclick='showAlert3()'>Все товары</button>
</div>
<?php
include 'tests.php';

// Начинаем сессию
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
$id = 0;
//Создаем экземпляр класса
$tests = new tests($query,$id);

//Вызываем функцию вывод аданных
$res2 = $tests->get2();

$get_bd = $tests->get1_2(1);
session_start();

function gets($id, $tests){
    $get_bd = $tests->get1_2($id);
    echo "<ul>";

    while($result = mysqli_fetch_array($get_bd)){

        echo "<li>";
        ?>
        <?php
        $id = $result['id'];
        echo " <button type='submit' onclick='showAlert2($id)'>";
        print_r("{$result['name']}");

        echo "</button>";
        echo "<div id='name$id'></div>";
        echo "</li>";


    }
    echo " </ul>";
}

?>


<div class="main">
    <div class="container">
        <div class="col-1-3">
            <?php
            gets(0,$tests);
            ?>

        </div>
        <div class="col-2-3" id="product">
            <?php
            while ($result = mysqli_fetch_array($res2)) {
                echo "<a>";
                print_r("{$result['name']}");
                echo "</a><br>";
            }
            ?>
        </div>
    </div>


    <script src="jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
        /*


                function showAlert()
                {

                    var url_string = window.location.href;
                    var url = new URL(url_string);
                    var c = url.searchParams.get("group");

                            $('#error_sure_name').html("");
                            $("#error_sure_name").append(c);
                            $("#error_sure_name").append(window.location.search);
                    return;
                */
    </script>

    <script>

        function showAlert1($id)
        {

        }

        function showAlert2($id)
        {
            $.ajax({
                type: 'GET',
                url: 'group.php?group='+$id,
                contentType: "application/json",
                success: function(data) {

                    $('#name'+$id).html("");
                    $("#name"+$id).append(data);
                }

            })

            $.ajax({
                type: 'GET',
                url: 'product.php?product='+$id,
                contentType: "application/json",
                success: function(data) {

                    $('#product').html("");
                    $("#product").append(data);
                }

            })
        }

        function showAlert3()
        {

            $.ajax({
                type: 'GET',
                url: 'productAll.php',
                contentType: "application/json",
                success: function(data) {

                    $('#product').html("");
                    $("#product").append(data);
                }

            })
        }

    </script>

</body>
</html>
