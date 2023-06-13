<?php


class tests{
        //Связь к бд
        private $db;

        //Название таблицы
        private $dbTableName = 'tests';
        //Функция, которая при запуске будет фиксировать соединение к базе, создавать таблицу и ее заполнять
        public function __construct($db)
        {
            //Связь с бд
            $this->db = $db;

            //Создаем таблицу
            $this->createTable();

            //Заполняем таблицу
            $this->fill();

        }


        private function createTable()
        {
            $createTestTableSQL = "CREATE TABLE ".$this->dbTableName."(
              id int PRIMARY KEY AUTO_INCREMENT,
              script_name varchar(25) NOT NULL,
              start_time int NOT NULL,
              end_time int NOT NULL,
              result enum('normal', 'illegal', 'failed', 'success') NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci	;";
                    $this->db->query($createTestTableSQL);
        }


    //Заполнение базы данных
    public function fill(){
            for($i=0;$i<10;$i++){
                $arr = array('normal', 'illegal', 'failed', 'success');
                $script_name = uniqid();
                $this->db->query('INSERT INTO tests (script_name,start_time,end_time,result) VALUES ("' . $script_name . '",' . rand(0,10000) . ', ' . rand(0,10000) . ',"' . $arr[rand(0,3)] . '")');
            }
       }
//Получаем данные
       public function get(){
           $selectNormalSuccess = "SELECT id, script_name, start_time, end_time, result FROM ".$this->dbTableName." WHERE result IN('normal', 'success');";
          $sth = $this->db->query($selectNormalSuccess);
           while ($result = mysqli_fetch_array($sth)) {
               echo "{$result['id']}: {$result['script_name']} : {$result['start_time']} : {$result['end_time']} : {$result['result']}<br>";
           }
           //return mysqli_fetch_array($sth);
       }



   }

