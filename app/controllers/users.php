<?php
// include("../../path.php");
include SITE_ROOT . "/app/database/db.php";

// function userAuth($user){
//     $_SESSION['id'] = $user['id'];
//     $_SESSION['login'] = $user['userName'];
//     $_SESSION['admin'] = $user['admin'];

//     if($_SESSION['admin']){
//         header('location:' . BASE_URL . 'admin/admin.php');
//     }else{
//         header('location:' . BASE_URL);
//     }
// }

$users = selectAll('users');

$regStatus = '';
$errMsg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2) {
        $errMsg = "Логин должен быть более 2-ух символов";
    }elseif($passF !== $passS){
        $errMsg = "Пароли должны совпадать";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже зарегистрирован";
        }
        else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);  
            $post = [
                'admin' => $admin,
                'userName' => $login,
                'email' => $email,
                'password' => $pass
                
            ];
        
            $id = insert('users', $post);
            // $errMsg = 'Пользователь ' . '<strong>' . $login . '</strong>' . ' успешно зарегистрирован';
            $user = selectOne('users', ['id' => $id]);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['userName'];
            $_SESSION['admin'] = $user['admin'];

            if($_SESSION['admin']){
                header('location:' . BASE_URL . 'admin/posts/index.php');
            }else{
                header('location:' . BASE_URL);
            }
            
        }
    }
}
else{
    
    $login = '';
    $email = '';
}
    // $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);   
    
//авторизация
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
   
    // $admin = 0;
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);

    

    if($email === '' || $pass === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
       $existence = selectOne('users', ['email' => $email]);
       if ($existence && password_verify($pass, $existence['password'])){
        //avtorziovat

        //userAuth($xistence); 


        $_SESSION['id'] = $existence['id'];
        $_SESSION['login'] = $existence['userName'];
        $_SESSION['admin'] = $existence['admin'];

        if($_SESSION['admin']){
            header('location:' . BASE_URL . 'admin/posts/index.php');
        }else{
            header('location:' . BASE_URL);
        }
        }else{
            //oshibka брутфорс
            $errMsg = "Почта либо пароль введены неверно";
        }

    }   
}
else{
    $email = '';
}

// Добавление с админки
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){
    
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2) {
        $errMsg = "Логин должен быть более 2-ух символов";
    }elseif($passF !== $passS){
        $errMsg = "Пароли должны совпадать";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже зарегистрирован";
        }
        else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if(isset($_POST['admin'])){
                $admin = 1;
            }  
            else {
                $admin = 0;
            }
            $post = [
                'admin' => $admin,
                'userName' => $login,
                'email' => $email,
                'password' => $pass
                
            ];
        
            $id = insert('users', $post);
            // $errMsg = 'Пользователь ' . '<strong>' . $login . '</strong>' . ' успешно зарегистрирован';
            
            header('location:' . BASE_URL . 'admin/users/index.php');
            
            
        }
    }
}
else{
    
    $login = '';
    $email = '';
}

// Редактирование пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $post = selectOne('users', ['id' => $id]);
    
    $id = $post['id'];
    $admin = $post['admin'];
    $username = $post['userName'];
    $email = $post['email'];
    
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
    
    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;
    
    
    if($mail === '' || $login === '' ){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2) {
        $errMsg = "Название товара должно быть более 2-х символов";
    }elseif($passF !== $passS){
        $errMsg = "Пароли должны совпадать";}
    else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'userName' => $login,
                'email' => $mail,
                'password' => $pass,
            ];
            
            $cat_id = update('users', $id, $post);
            header('location:' . BASE_URL . 'admin/users/index.php');      
    
    }
}
else{
    $mail = "";
    $login = "";
}

// Удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location:' . BASE_URL . 'admin/users/index.php');
}
?>