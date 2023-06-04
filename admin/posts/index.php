<?php
    include("../../path.php");
    include("../../app/controllers/posts.php");
    
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
                <a href="<?php echo BASE_URL . "admin/posts/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
                <div class="col-1"></div>
                <a href="<?php echo BASE_URL . "admin/posts/index.php"; ?>" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Управление товарами</h2>
                <div class="id col-1">ID</div>
                <div class="title col-3">Название</div>
                <div class="price col-2">Стоимость</div>
                <div class="red col-6">Управление</div>
               
            </div>
            <?php foreach ($posts as $key => $post):?>
            <div class="row post">
                <div class="id col-1"><?=$post['id']?></div>
                <div class="title col-3"><?=$post['name']?></div>
                <div class="price col-2"><?=$post['price']?></div>
                <div class="red col-2 "><a class="btn btn-outline-info" href="edit.php?id=<?=$post['id'];?>">Изменить</a></div>
                <div class="del col-2"><a class="btn btn-outline-danger" href="edit.php?delete_id=<?=$post['id'];?>">Удалить</a></div>
                <?php if ($post['status']):?>
                    <div class="del col-2"><a class="btn btn-outline-warning" href="edit.php?publish=0&pub_id=<?=$post['id'];?>">Черновик</a></div>
                <?php else: ?>
                    <div class="del col-2"><a class="btn btn-outline-warning" href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Опубликовать</a></div>
                <?php endif; ?>   
            </div>
            <?php endforeach;?>
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