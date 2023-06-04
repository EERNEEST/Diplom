<?php
    include("../../path.php");
    include("../../app/controllers/users.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    
    
    <title>Document</title>
</head>
<body>
 
  <?php
    include("../../app/include/header-admin.php");
  ?>

  <div class="container">
  <?php include("../../app/include/sidebar-admin.php");?>
        <div class="posts col-9">
        <div class="row button">
                <a href="<?php echo BASE_URL . "admin/users/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
                <div class="col-1"></div>
                <a href="<?php echo BASE_URL . "admin/users/index.php"; ?>" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Добавить пользователя</h2>
            </div>
            <div class="row add-post">
                <div class="col-12 err">
                    <p><?=$errMsg?></p>
                </div>
                <form action="create.php" method="post">
                <div class="col">
                    <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
                    <input value="<?=$login;?>"  type="text" class="form-control" id="formGroupExampleInput" name="login" placeholder="введите ваш логин...">
                </div>
                
                <div class="col">
                    <label for="exampleInputEmail" class="form-label">Email</label>
                    <input  value="<?=$email;?>" type="email" class="form-control" id="exampleInputEmail" name="mail" aria-describedby="emailHelp">
                    
                </div>
              
                <div class="col">
                    <label class="form-label" for="exampleInputPassword1">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass-first">
                </div>
               
                <div class="col">
                    <label class="form-label" for="exampleInputPassword2">Повторите пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="pass-second">
                </div>
                <div class="col">
                    
                    <input type="checkbox" value="1" class="form-check-input" id="flexCheckChecked" name="admin">
                    <label class="form-check-label" for="flexCheckChecked">Администратор?</label>
                </div>
                <div class="col">
                    <button name="create-user" class="btn btn-primary" type="submit">Создать</button>
                 </div>
                </form>
            </div>
           
        </div>
    </div>
  </div>
  
  <?php
    include("../../app/include/footer-admin.php");
  ?>
  <script src="../../javascript/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
</body>
</html>     