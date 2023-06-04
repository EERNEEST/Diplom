<?php
    include("path.php");
    
    include("app/controllers/topics.php");
    $posts = selectAfter('games', ['status' => 1]);
    $liders = selectFour('games');
    $popular = selectEight('games');
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

  <!-- carousel -->
  <div class="car container p-0 d-none d-md-block ">
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
   
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="5000">
        <a href="#"><img src="image/11.jpg" class="d-block w-100 carousel__image" alt="..."></a>
        <!-- <div class="carousel-caption d-none d-md-block">
          <h5>Метка первого слайда</h5>
          <p>Некоторый репрезентативный заполнитель для первого слайда.</p>
        </div> -->
      </div>
      <div class="carousel-item" data-interval="5000">
      <a href="#"><img src="image/carousel2.png" class="d-block w-100" alt="..."></a>
        <!-- <div class="carousel-caption d-none d-md-block">
          <h5>Метка второго слайда</h5>
          <p>Некоторый репрезентативный заполнитель для второго слайда.</p>
        </div> -->
      </div>
      <div class="carousel-item" data-interval="5000">
      <a href="#"><img src="image/carousel3.jpg" class="d-block w-100" alt="..."></a>
        <!-- <div class="carousel-caption d-none d-md-block">
          <h5>Метка третьего слайда</h5>
          <p>Некоторый репрезентативный заполнитель для третьего слайда.</p>
        </div> -->
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Предыдущий</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Следующий</span>
    </button>
    </div>
  </div>

  
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
    
        
        <p class="mt-2">Популярное</p2>
        <div class="row justify-content-md-around justify-content-sm-between ">
        
      <div class="container px-0 mb-3 d-none d-xxl-block">
        <div class="slider-block">
        <button class="slider-prev" id="slider-prev" type="button" >
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="slider-next" id="slider-next" type="button">
          <span class="carousel-control-next-icon" ></span>
        </button>
          <div class="slider-line">
              <?php foreach ($popular as $pop):?>
              <div class="card ">
                <img src="<?=BASE_URL . 'assets/posts/' . $pop['image']?>" class="card-img-top" alt="Картинка товара">
                <div class="card-body text-center">
                  <h5 class="card-title"><?=$pop['name']?></h5>
                  <p class="card-text"><?=$pop['price']?> ₽</p>
                  <a href="<?=BASE_URL . 'singleGame.php?post=' . $pop['id']; ?>" class="btn card__btn">Купить</a>
                </div>
              </div>
              <?php endforeach; ?>
           
          </div>
        </div>
      </div>
        <div class="row justify-content-md-around justify-content-sm-between d-flex d-xxl-none">
            <?php foreach ($popular as $pop):?>
              <div class="card ">
                <img src="<?=BASE_URL . 'assets/posts/' . $pop['image']?>" class="card-img-top" alt="Картинка товара">
                <div class="card-body text-center">
                  <h5 class="card-title"><?=$pop['name']?></h5>
                  <p class="card-text"><?=$pop['price']?> ₽</p>
                  <a href="<?=BASE_URL . 'singleGame.php?post=' . $pop['id']; ?>" class="btn card__btn">Купить</a>
                </div>
              </div>
            <?php endforeach; ?>
        </div>
      </div>
          <p class="mt-2">Лидеры продаж</p2>
        <div class="row justify-content-md-around justify-content-sm-between pb-4">
        <?php foreach ($liders as $lider):?>
          <div class="card ">
            <img src="<?=BASE_URL . 'assets/posts/' . $lider['image']?>" class="card-img-top" alt="Картинка товара">
            <div class="card-body text-center">
              <h5 class="card-title"><?=$lider['name']?></h5>
              <p class="card-text"><?=$lider['price']?> ₽</p>
              <a href="<?=BASE_URL . 'singleGame.php?post=' . $lider['id']; ?>" class="btn card__btn">Купить</a>
            </div>
          </div>
            <?php endforeach; ?>
        </div>
        
        
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
  <div class="container information ">
    <div class="p-5">
      <h1 class="information__main-text">Настольные игры для классных людей<h1>
      <p class="question">— Можно ли посмотреть все игры в живую?</p>
      <p class="request">Да, конечно. Вы сейчас в интернет-магазине настольных игр Мосигры, а так, вообще, у нас огромная федеральная сеть магазинов по всей стране. Приходите, смотрите всё, покупайте.</p>
      <p class="question">— А можно поиграть прямо в магазине?</p>
      <p class="request">Да, мы держим открытыми самые популярные и крутые игры. Их можно рассмотреть изнутри и сыграть с продавцом быструю партию, чтобы слету понять правила.</p>
      <p class="question">— Ой, я ничего не знаю про настольные игры, но хочу купить одну. С чего начать?</p>
      <p class="request">Тогда вам нужны самые простые компанейские игры. Если вы идёте на вечеринку, на день рождения или зовёте в гости друзей, то вот специальный раздел с очень простыми играми для компании, в котором вы точно встретите что-то подходящее. Для первого раза советуем что-нибудь такое, что вообще ни у кого не вызовет вопросов по правилам. Наши фавориты — любимые деревянные башни, откуда надо вынимать по бруску, пока они не упадут; разные игры на объяснение слов вроде Крокодила: Большая вечеринка, простые игры для шумных компаний типа Пятницы или викторины вроде Ответь за 5 секунд.</p>
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