<?php

include SITE_ROOT . "/app/database/db.php";
if(!$_SESSION){
    header('location' . BASE_URL . 'log.php');
}
$id ='';
$title='';
$price='';
$content='';
$img='';
$topic='';
$errMsg = [];
// Вызов на получение данных на страницу index
$allCategory = selectAll('category');
$posts = selectAll('games');

// Форма создания товара
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){
   
    // Проверка фотографии
    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\posts\\" . $imgName;

        if(strpos($fileType, 'image')===false){
            array_push($errMsg, "Подгружаемый файл не является изображением");
        }
        else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{           
                array_push($errMsg, "Ошибка загрузки изображения на сервер");
            }
        } 
    }else{
        array_push($errMsg, "Ошибка получения изображения");
    }

    $title = trim($_POST['title']);
    $price = trim($_POST['price']);
    $topic = trim($_POST['topic']);
    $content = trim($_POST['content']);
    
   // Проверка текстовых полей
    if($title === '' || $price === '' || $topic ===''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title, 'UTF8') < 5) {
        array_push($errMsg, "Название товара должно быть более 5-и символов");
    }else{
        $existence = selectOne('games', ['name' => $title]);
        if ($existence['name'] === $title){
            array_push($errMsg, "Товар уже существует");
        }
        else{ 
            $post = [
                'image' => $_POST['img'],
                'name' => $title,
                'price' => $price,
                'description' => $content,
                'id_category' => $topic
            ];
            
            $post = insert('games', $post);
            header('location:' . BASE_URL . 'admin/posts/index.php');
            
        }
    }
}
else{
    
    $title = '';
    $content = '';
}


// Редактирование товара
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $post = selectOne('games', ['id' => $id]);

    $id = $post['id'];
    $title = $post['name'];
    $price = $post['price'];
    $topic = $post['id_category'];
    $content = $post['description'];
    
    
    
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){
    $title = trim($_POST['title']);
    $price = trim($_POST['price']);
    $topic = trim($_POST['topic']);
    $content = trim($_POST['content']);
    
    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\posts\\" . $imgName;

        if(strpos($fileType, 'image')===false){
            array_push($errMsg, "Подгружаемый файл не является изображением");
        }
        else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{           
                array_push($errMsg, "Ошибка загрузки изображения на сервер");
            }
        }
        
        
    }else{
        array_push($errMsg, "Ошибка получения изображения");
    }
   
    if($title === '' || $price === '' || $topic ===''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title, 'UTF8') < 5) {
        array_push($errMsg, "Название товара должно быть более 5-и символов");
    }else{
            $post = [
                'image' => $_POST['img'],
                'name' => $title,
                'price' => $price,
                'description' => $content,
                'id_category' => $topic
            ];
            $id = $_POST['id'];
            $cat_id = update('games', $id, $post);
            header('location:' . BASE_URL . 'admin/posts/index.php');      
    
    }
}
// Публикация
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('games', $id, ['status' => $publish]);
    header('location:' . BASE_URL . 'admin/posts/index.php');
    exit();
}

// Удаление товара
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('games', $id);
    header('location:' . BASE_URL . 'admin/posts/index.php');
}


?>
