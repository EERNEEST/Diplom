<?php

include SITE_ROOT . "/app/database/db.php";
$id ='';
$name='';
$description='';
$errMsg = '';
// Вызов на получение данных на страницу index
$allCategory = selectAll('category');

// Форма создания категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    

    if($name === '' || $description === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2) {
        $errMsg = "Название категории должно быть более 2-ух символов";
    }else{
        $existence = selectOne('category', ['name' => $name]);
        if ($existence['name'] === $name){
            $errMsg = "Категория уже существует";
        }
        else{ 
            $cat = [
                'name' => $name,
                'description' => $description  
            ];
        
            $id = insert('category', $cat);
            header('location:' . BASE_URL . 'admin/topics/index.php');
            
        }
    }
}
else{
    
    $name = '';
    $description = '';
}


// Редактирование категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $category = selectOne('category', ['id' => $id]);
   
    $id = $category['id'];
    $name = $category['name'];
    $description = $category['description'];
    
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    if($name === '' || $description === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2) {
        $errMsg = "Название категории должно быть более 2-ух символов";
    }else{
        
        $cat = [
            'name' => $name,
            'description' => $description  
        ];
            
        $id = $_POST['id'];

        $cat_id = update('category', $id, $cat);
        header('location:' . BASE_URL . 'admin/topics/index.php');
            
        
    }
}

// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
  
    delete('category', $id);
    header('location:' . BASE_URL . 'admin/topics/index.php');
}
?>
