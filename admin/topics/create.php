<?php
    include("../../path.php");
    include("../../app/controllers/topics.php");
    
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
                <a href="<?php echo BASE_URL . "admin/topics/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
                <div class="col-1"></div>
                <a href="<?php echo BASE_URL . "admin/topics/index.php"; ?>" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Добавить категорию</h2>
            </div>
            <div class="row add-post">
                <div class="col-12 err">
                    <p><?=$errMsg?></p>
                </div>
                <form action="create.php" method="post">
                    <div class="col">
                        <input value="<?=$name;?>" name="name" type="text" class="form-control" placeholder="Название категории" aria-label="Название категории" >
                    </div>
                    
                    <div class="input-group col">
                        <span class="input-group-text">Описание категории</span>
                        <textarea  name="description" class="form-control" aria-label="With textarea"><?=$description;?></textarea>
                    </div>
                   
                    <div class="col">
                        <button name="topic-create" class="btn btn-primary" type="submit">Сохранить</button>
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