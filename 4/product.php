
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
$res1 = $tests->get();
$res2 = $tests->get2();
//$res3 = mysqli_fetch_array($tests->get1_2());
$get_bd = $tests->get1_2(1);
session_start();

function gets($id,$tests){
    $get_bd = $tests->getProduct2($id);
    while ($result = mysqli_fetch_array($get_bd)) {
        echo "<a>";
        print_r("{$result['name']}");
        echo "</a><br>";
    }

}

?>
            <?php
                gets($_GET['product'],$tests);
            ?>




