<?php

$array = [
    ['asasas@yandex.ru', 1, "Максим"],
    ['RRrom@mail.ru', 2, "Алег"],
    ['Vlad@gmail.com', 3, "Влад"],
    ['anastas123@yahoo.com', 4, "Настя"]
];
$err = 0;
$_POST['email'] = "sadsasda";
//Проверяем что поля не пустые
if($_POST['name'] != "" && $_POST['surname']!= "" && $_POST['email']!= "" && $_POST['password']!= ""&& $_POST['password_confirmation']!= "" && $_POST['password']== $_POST['password_confirmation']){
    //Проверяем что email е пустой
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        //Цикл перебора email на поиск схожих
        for($i=0;$i<count($array);$i++){
            if($_POST['email'] != $array[$i][0]){
                $err++;
            }
        }

        if($err == count($array)){
            $result = array(
                'text'  => 'Регистрация прошла успешно',
                'error' => 'false'
            );

            echo json_encode($result);
        }
        else{
            $result = array(
                'text'  => 'Ошибка валидации, данный email уже занят',
                'error' => 'true'
            );

            echo json_encode($result);
        }

    }
    else{
        $result = array(
            'text'  => 'Неправильно заполнено поле для email',
            'error' => 'true'
        );

        echo json_encode($result);
    }

}
else{
    $result = array(
        'text'  => 'Не все поля корректно заполнены',
        'error' => 'true'
    );

    echo json_encode($result);
}

