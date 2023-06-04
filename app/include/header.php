<div class="container head">
      
      <nav class="container navbar navbar-expand-lg fixed-top mx-auto mb-2 header" >
      <div class="container appheader">
          <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
          <a href="<?php echo BASE_URL?>"><img src="image/logo.svg" width="118" height="60" class=""
                 alt="Логотип" loading="lazy"></a>
          </div>
          <div class="flex-grow-1">
          <a href="<?php echo BASE_URL?>"><h1 class="mb-0">Ludum</h1></a>
          </div>
        
          </div>
        </div>
        <p class="ms-auto contact__number ">+7 (4852) 14-22-55</p>
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <img src="image/logo.svg" width="118" height="60" class=""
                 alt="Логотип" loading="lazy">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Ludum</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-start d-flex flex-grow-1 pe-3">
                <li class="nav-item order-sm-3 order-lg-1" style="width: 152px" >
                  <a class="nav-link vis_kat_2" aria-current="page" href="<?php echo BASE_URL . 'games.php'?>">Настольные игры</a>
                </li>
                <div class="order-lg-6 order-sm-6 vis_kat">
                  <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle " href="<?php echo BASE_URL . 'about.php'?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Настольные игры
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Стратегические игры</a></li>
                      <li><a class="dropdown-item" href="#">Карточные  игры</a></li>
                      <li><a class="dropdown-item" href="#">Для компании</a></li>   
                      <li><a class="dropdown-item" href="#">Приключенческие игры</a></li>   
                      <li><a class="dropdown-item" href="#">Для вечеринки</a></li>      
                      <li><a class="dropdown-item" href="#">Детективные игры</a></li>    
                    </ul>
                  </li>
                </div>          
                
                <li class="nav-item order-sm-4 order-lg-2">
                  <a class="nav-link" href="<?php echo BASE_URL . 'stocks.php'?>">Акции</a>
                </li>
                
                
                <li class="nav-item dropdown order-sm-2 order-lg-5 nav__acc__text">
                <?php if (isset($_SESSION['id'])):?>
                  <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false" href="#"><?php echo $_SESSION['login']; ?></a>
                  <ul class="dropdown-menu">
                  <?php if ($_SESSION['admin']):?>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'admin/posts/index.php'?>">Админ-панель</a></li>
                    <?php endif;?>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'logout.php'?>">Выход</a></li>             
                  </ul>
                <?php else:  ?> 
                  <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false" href="<?php echo BASE_URL . 'login.php'?>">Войти</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'registr.php'?>">Регистрация</a></li>
                               
                  </ul>
                <?php endif;?>
                  
                </li>
                <li class="nav-item order-sm-2 order-lg-5 nav__acc__img">
                <?php if (isset($_SESSION['id'])):?>
                  <a class="nav-link" href="#"> 
                    <!-- сделать картинку другим цветом -->
                    <img src="image/account.png" class=" d-inline-block" width="30" height="30" alt="Аккаунт" loading="lazy">
                  </a>
                  <ul class="">
                  <?php if ($_SESSION['admin']):?>
                      <li class=""><a class="" href="<?php echo BASE_URL . 'admin/posts/index.php'?>">Админ-панель</a></li>
                      <?php endif;?>
                      <li><a class="" href="<?php echo BASE_URL . 'logout.php'?>">Выход</a></li>   
                             
                  </ul>
                  <?php else:  ?> 
                    <a class="nav-link" href="<?php echo BASE_URL . 'login.php'?>"><img src="image/account.png" class=" d-inline-block" width="30" 
                    height="30" alt="Аккаунт" loading="lazy"></a>
                  <ul class="">
                    <li><a class="" href="<?php echo BASE_URL . 'registr.php'?>">Регистрация</a></li>
                               
                  </ul>
                <?php endif;?>
                  
                  <!-- <a class="nav-link nav__acc__text "  href="<?php //echo BASE_URL . 'registr.php'?>">Личный кабинет</a>
                  <a class="nav-link nav__acc__img" href="<?php //echo BASE_URL . 'registr.php'?>">
                    <img src="image/account.png" class=" d-inline-block" width="30" height="30" alt="Аккаунт" loading="lazy">
                  </a> -->
                </li>
                <!-- <li class="nav-item order-sm-2 order-lg-5 nav__acc__img">
                <?php //if (isset($_SESSION['id'])):?>
                  <a class="nav-link" href="#"> 
                    
                    <img src="image/account.png" class=" d-inline-block" width="30" height="30" alt="Аккаунт" loading="lazy">
                  </a>
                  <ul class="">
                    
                      <li class=""><a class="" href="">Админ-панель</a></li>
                      
                      <li><a class="" href="">Выход</a></li>   
                             
                  </ul>
                <?php// endif;?>
                  
                  <a class="nav-link nav__acc__text "  href="<?php //echo BASE_URL . 'registr.php'?>">Личный кабинет</a>
                  <a class="nav-link nav__acc__img" href="<?php //echo BASE_URL . 'registr.php'?>">
                    <img src="image/account.png" class=" d-inline-block" width="30" height="30" alt="Аккаунт" loading="lazy">
                  </a> 
                </li> -->
                
                <li class="nav-item order-sm-1 order-lg-4 ">
                  <a class="nav-link nav__cart__text " href="<?php echo BASE_URL . 'cart.php'?>">Корзина</a>
                  <a class="nav-link nav__cart__img" href="<?php echo BASE_URL . 'cart.php'?>">
                    <img src="image/cart.png" class=" d-inline-block" width="30" height="30" alt="Корзина" loading="lazy">
                  </a>
                </li>
                
                <div class="order-lg-6 order-sm-6">
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle " href="<?php echo BASE_URL . 'about.php'?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    О компании
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'contacts.php'?>">Контактная информация</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'payment.php'?>">Оплата</a></li>             
                  </ul>
                </li>
                </div>
                
              </ul>
              <form action="search.php" class="input-group flex-nowrap vis_search_2" method="post">
                
                
                  <input type="text" name="search-term" class="form-control p-0 search" placeholder="Например: Взрывные котята" aria-label="Поиск"
                  aria-describedby="button-addon2">
                  <span class="input-group-text" id="addon-wrapping" style="height: 46px;">
                      <img src="image/search.png" width="20" height="20" alt="Поиск" loading="lazy">
                  </span>
                  
                
                </form>
            </div>
            
          </div>
          <p class="text-center name__cat">Каталог</p>
          
        </div>
      </nav>
      <form action="search.php" class="input-group flex-nowrap vis_search" method="post">
    
       
          <input type="text" name="search-term" class="form-control p-0 " placeholder="Например: Взрывные котята" aria-label="Поиск"
         aria-describedby="button-addon2">
       
       
      </form>
    </div>