<?php


class tests{
        //Связь к бд
        private $db;


        //Функция, которая при запуске будет фиксировать соединение к базе, создавать таблицу и ее заполнять
        public function __construct($db, $id)
        {
            //Связь с бд
            $this->db = $db;


        }


//Получаем данные
       public function get(){
           $selectNormalSuccess = "SELECT * FROM groups where id_parent = 0;";
           $sth = $this->db->query($selectNormalSuccess);

           return $sth;

       }
    public function get1_2($id){
        $selectNormalSuccess = "SELECT * FROM groups where id_parent = ".$id.";";
        $sth = $this->db->query($selectNormalSuccess);

        return $sth;

    }
    public function get2(){
        $selectNormalSuccess = "SELECT * FROM products";
        $sth = $this->db->query($selectNormalSuccess);

        return $sth;

    }

    public function getProduct2($id){
        $selectNormalSuccess = "WITH RECURSIVE p AS 
( SELECT groups.id as groupsid, products.id as productsid, groups.id_parent, products.id_group, products.name FROM groups LEFT JOIN products ON groups.id = products.id_group where groups.id_parent = ".$id." 
UNION 
SELECT groups.id as groupsid, products.id as productsid, groups.id_parent, products.id_group, products.name FROM products LEFT JOIN groups ON groups.id = products.id_group where groups.id = products.id_group and groups.id = groups.id_parent 
) SELECT * FROM p;";
        $sth = $this->db->query($selectNormalSuccess);

        return $sth;

    }

    public function getProduct3(){
        $selectNormalSuccess = "SELECT * FROM products";
        $sth = $this->db->query($selectNormalSuccess);

        return $sth;

    }
    


   }

