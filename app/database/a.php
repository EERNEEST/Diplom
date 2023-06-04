<?php

require('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '<pre>';
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
function ins($table, $params){
    global $pdo;
    $i = 0;
    $coll ='';
    $mask ='';
    foreach($params as $key => $value){
        if($i === 0){
            $coll = $coll . "$key";
            $masl =$mask . "'$value'";
        }
        else{
            $coll = $coll . ", $key";
            $mask =$mask . ", '$value'";
        }
        $i++;
    }
    $sql ="INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query -> execute($params);
    dbCheckError($query);
}
$date =[
    'admin'=> '0',
    'userName'=> 'nikitos',
    'email'=> 'sadas@mail.ru',
    'password'=> '12312',
    'created'=> '2023-05-15'
];
ins('user', $date);