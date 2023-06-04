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
                <h2>Редактирование товара</h2>
            </div>
            <div class="row">
                <div class="col-12 err">
                    <?php include("../../app/helps/errorInfo.php");?>
                </div>
                <form action="edit.php" method="post" enctype="multipart/form-data">
                <input value="<?=$id;?>" name="id" type="hidden" >
                    <div class="col my-4">
                        <input name="title" value="<?=$title; ?>" type="text" class="form-control" placeholder="Title" aria-label="Название товара" >
                    </div>
                    <div class="col my-4">
                        <input name="price" value="<?=$price; ?>" type="text" class="form-control" placeholder="Price" aria-label="Стоимость" >
                    </div>
                    <div class="input-group col mb-4">
                    
                        <span class="input-group-text">Описание</span>
                        <textarea id="editor" name="content" class="form-control" aria-label="With textarea"><?=$content;?></textarea>
                    </div>
                    <div class="col input-group my-4">
                        <input name="img" type="file" class="form-control" id="inputGroupFile2">
                        <label for="inputGroupFile2" class="input-group-text">Upload</label>
                    </div>
                    <select name="topic" class="form-select my-4" aria-label="Default select example">
                        
                        <?php foreach($allCategory as $key => $category):?>
                            <option value="<?=$category['id']?>"><?=$category['name']?></option>
                        <?php endforeach; ?>
                    </select>
                    
                    <div class="col my-4">
                        <button name="edit_post" class="btn btn-primary" type="submit">Сохранить товар</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
  </div>
  
  <?php
    include("../../app/include/footer-admin.php");
  ?>
  <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
  <script src="../../javascript/desc.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
</body>
</html>     