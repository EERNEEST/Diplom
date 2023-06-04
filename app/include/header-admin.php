<div class="container head">
      
      <nav class="container navbar navbar-expand-lg fixed-top mx-auto mb-2 header" >
      <div class="container appheader">
          <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
          <a href="<?php echo BASE_URL?>"><img src="<?php echo BASE_URL?>image/logo.svg" width="118" height="60" class=""
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
              <img src="<?php echo BASE_URL?>image/logo.svg" width="118" height="60" class=""
                 alt="Логотип" loading="lazy">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Ludum</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-start d-flex justify-content-end flex-grow-1 pe-3">
                
                
                
                
                <li class="nav-item dropdown order-sm-2 order-lg-5 nav__acc__text">
                
                  <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false" href="#"><?php echo $_SESSION['login']; ?></a>
                  <ul class="dropdown-menu">
 
                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'logout.php'?>">Выход</a></li>             
                  </ul>
                
                  
                </li>
                <!-- <li class="nav-item order-sm-2 order-lg-5 nav__acc__img">
               
                  <a class="nav-link" href="#"> 
                    //сделат ькартинку другим цветом 
                    <img src="<?php echo BASE_URL?>image/account.png" class=" d-inline-block" width="30" height="30" alt="Аккаунт" loading="lazy">
                  </a>
                  <ul class="">
                      <li class=""><a class="" href="#">Админ-панель</a></li>
            
                      <li><a class="" href="<?php echo BASE_URL . 'logout.php'?>">Выход</a></li>         
                  </ul>
                  
                </li> -->
                 
              </ul>          
            </div>
            
          </div>
          <p class="text-center name__cat">Каталог</p>
          
        </div>
      </nav>
      
    </div>