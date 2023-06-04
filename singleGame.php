<?php
    include("path.php");
    include SITE_ROOT . "/app/database/db.php";
    
    
    $post = selectOneGame('games', $_GET['post']);
   
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
      <!-- центральнео окно -->
      <div class="col-md-9 col-sm-9 col-12 maingame">
        <h1><?=$post['name'];?></h1>

        <img src="<?=BASE_URL . 'assets/posts/' . $post['image'];?>" class="img-fluid mx-auto d-block" style="width:266px; height:266px" alt="...">

        <nav>
        <div class="nav tab_game nav-tabs " id="nav-tab" role="tablist">
          <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Описание</a>
          <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Правила</a>
          <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Характеристики</a>
        </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <?=$post['description'];?>
            <!-- <h3>Безумие, апокалипсис и котики</h3>
            <p>«Взрывные котята» — это карточная игра, дико популярная на «Кикстартере». Она там собрала почти девять миллионов долларов — для настольных игр это рекорд. Все в неё просто влюбились. Кому-то эта игра напоминает «Уно», кому-то русскую рулетку. Вы тянете карты из колоды, в которой среди прочих карт замешаны взрывные котята — они сразу выкидывают вас из игры. Все остальные карты помогают избежать встречи с опасными котятами и подставить под удар друзей. Вам нужно остаться в игре последним выжившим.</p>
            <img src="image/desckotki.jpg" class="img-fluid mx-auto d-block" alt="...">
            <h3>Мяу, бдыщь!</h3>
            <p>Берите эту игру на вечеринки. Научиться в неё играть — дело пяти минут, а весело будет всем.
            Подарите игру человеку, который обожает котят. Тут их столько!
            Играйте с семьёй, друзьями, детьми.
            Возьмите игру на пикник и в дорогу — время пролетит незаметно.
            Подарите самому весёлому человеку, которого знаете.
            Внутри:
            56 карт
            Правила игры
            Размер коробки: 165x114x41 мм
            Размер карт: 63x88 мм (рекомендуются протекторы из данного раздела, 56 шт.)</p> -->
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <p>
            «Колонизаторы» — это нашумевший карточный хит с площадки «Кикстартер», где он побил все мыслимые рекорды и сразу же влюбил в себя более двухсот тысяч человек по всему миру. Игра крайне проста в освоении и отличается уникальным дизайном, вы точно влюбитесь в этих прекрасных рисованных котят!

            Игра предлагает быстрый и динамичный игровой процесс, где вам придётся взвешивать риски. Игра отдалённо напоминает своим принципом «русскую рулетку» — игроки тянут по очереди карты из колоды, и, если им попадается один из взрывных котеек, то он тут же взрывается и выбывает из игры! Для того, чтобы этого не произошло, можно использовать различные карты или даже их комбинации.

            Это очень милая, необычная и смешная игра для настоящих кошатников и любителей простых и динамичных настольных игр.
            </p>
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <p>
              
            Количество игроков	От 2 до 5 игроков
            Возраст игроков	От 10 лет
            Время игры	От 15 минут
            Вес	0.22 кг
            Производитель	Hobby World
            </p>
          </div>
        </div>
      </div>

      <!-- боковое окно -->
      <div class="col-md-3 col-sm-3 col-12 right-sidebar">
        <h1><?=$post['price'];?> ₽</h1>
        <a class="btn" href="#" role="button">В корзину</a>
       
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <p class="caption">Похожие игры</p>
            <div class="row justify-content-around flex-start">
              <div class="card " style="width: 13rem;">
                <img src="image/1.jfif" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Взрывные котята</h5>
                  <p class="card-text">970 рублей</p>
                  <a href="game.php" class="btn card__btn">Купить</a>
                </div>
              </div>
              <div class="card " style="width: 13rem;">
                <img src="image/1.jfif" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Взрывные котята</h5>
                  <p class="card-text">970 рублей</p>
                  <a href="game.php" class="btn card__btn">Купить</a>
                </div>
              </div>
              <div class="card " style="width: 13rem;">
                <img src="image/1.jfif" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Взрывные котята</h5>
                  <p class="card-text">970 рублей</p>
                  <a href="game.php" class="btn card__btn">Купить</a>
                </div>
              </div>
              <div class="card " style="width: 13rem;">
                <img src="image/1.jfif" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Взрывные котята</h5>
                  <p class="card-text">970 рублей</p>
                  <a href="game.php" class="btn card__btn">Купить</a>
                </div>
              </div>
            </div>
          </div>
        </div>
   
      </div>
</div>
      

  <?php
    include("app/include/footer.php");
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="javascript/script.js"></script>
</body>
</html>     