<?php

session_start();
require('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '<pre>';
    exit();
}
// Проверка БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
// Запрос на получение данных из таблицы
function selectAll($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i =0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value ="'".$value."'";
            }   
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }
            else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Запрос на получение одной строки данных из таблицы
function selectOne($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i =0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value ="'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }
            else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        } 
    }
    
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}
// $sql = $sql . " LIMIT 1";
// Запрос на получение 4 строки данных из таблицы
function selectEight($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i =0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value ="'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }
            else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        } 
    }
    $sql = $sql . " LIMIT 8";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Запрос на получение 4 c 4 строки данных из таблицы
function selectFour($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i =0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value ="'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }
            else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        } 
    }
    $sql = $sql . " LIMIT 4 OFFSET 8";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Запрос на получение после 8 строки данных из таблицы
function selectAfter($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i =0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value ="'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }
            else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        } 
    }
    $sql = $sql . " LIMIT 30 OFFSET 12";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// $params =[
//     'admin' => 1,
//     'email' => 'testPavel@mail.ru',
//     'username' => 'Павел'
// ];
// tt(selectAll('users'));

// Поиск по заголовку (простой)
function searchInName($text, $table1){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql ="SELECT * FROM $table1 AS p WHERE p.status = 1 AND p.name LIKE '%$text%'";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Выборка записи с категорией для сингл
function selectOneGame($table1, $id){
    
    global $pdo;
    $sql ="SELECT * FROM $table1 AS p WHERE p.id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

// Запись в таблицу
function insert($table, $params){
    global $pdo;

    $i=0;
    $col='';
    $mask='';
    foreach($params as $key => $value){
        if($i === 0){
            $col = $col . "$key";
            $mask = $mask ."'$value'";
        }
        else {
            $col = $col . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";
    // INSERT INTO `users` (`id`, `admin`, `userName`, `email`, `password`, `created`) VALUES (NULL, '1', 'Степан', 'Stepka228@mail.ru', 'uuqyw', current_timestamp());
    
    $query = $pdo->prepare($sql);
    
    $query->execute();
    
    dbCheckError($query);
    return $pdo->lastInsertId();
}
// $Array =[
//     'id' => "NULL",
//     'admin' => "0",
//     'userName' => 'Даниил',
//     'email' => 'danyavst@mail.ru',
//     'password' => '12345',
//     'created' => '2023-05-15 15:02:55'
// ];
$param =[
    'name' => "Павел"
];
$arrData = [
    "admin" => 0,
    "userName" => "Кирилл",
    "email" => "dasdas@mail.com",
    "password" => "qwesadzxc"
];

// Обновление строки в таблице
function update($table, $id, $params){
    global $pdo;

    $i=0;
    $str='';
    
    foreach($params as $key => $value){
        if($i === 0){
            $str = $str . $key . " = '" . $value . "'";
            
        }
        else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    
 
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
   
}
// $param =[
//     'userName' => "Павел"
// ];
// update('users', 3, $param);


// Удаление строки в таблице
function delete($table, $id){
    global $pdo;
    // DELETE FROM `users` WHERE 0
    $sql = "DELETE FROM $table WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
   
}

// delete('users', 5);