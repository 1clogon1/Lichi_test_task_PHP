
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
            ?>


        <?php
        echo "</li>";


    }
    echo " </ul>";
}

?>
            <?php
                gets($_GET['group'],$tests);
            ?>




