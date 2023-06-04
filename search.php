<?php
    include("path.php");
    
    include("app/controllers/topics.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
      $posts = searchInName($_POST['search-term'], 'games');

    }
   
    $liders = selectFour('games');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    
    <title>Document</title>
</head>
<body>
 
  <?php
    include("app/include/header.php");
  ?>

  
  <div class="container mt-2">
    <div class="row">
      <!-- сайдбар -->
      <div class=" col-lg-2 sidebar mb-auto ">
        <p class="mt-2">Категории</p>
        <ul class="nav flex-column sidebar__ul">
        <?php foreach($allCategory as $key => $category):?>
          <li class="nav-item">
            <a class="nav-link" href="#"><?=$category['name']; ?></a>
          </li>
          <?php endforeach; ?>
          
        </ul>
      </div>
      <!-- card -->
      <div class="col-md-12 col-sm-12 col-12 col-lg-10 wrapper_card">
          <p class="mt-2">Результаты поиска</p2>

        <div class="row justify-content-md-around justify-content-sm-between">
          <?php foreach ($posts as $post):?>
          <div class="card ">
            <img src="<?=BASE_URL . 'assets/posts/' . $post['image']?>" class="card-img-top" alt="Картинка товара">
            <div class="card-body text-center">
              <h5 class="card-title"><?=$post['name']?></h5>
              <p class="card-text"><?=$post['price']?> ₽</p>
              <a href="<?=BASE_URL . 'singleGame.php?post=' . $post['id']; ?>" class="btn card__btn">Купить</a>
            </div>
          </div>
            <?php endforeach; ?>
          
        </div>
    </div>
  </div>
</div>
  
  
  <?php
    include("app/include/footer.php");
  ?>
  <script src="javascript/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
</body>
</html>     