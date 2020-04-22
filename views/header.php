<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tatiana Roi - Haistylist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">

  <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="../css/animate.css">

  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">

  <link rel="stylesheet" href="../css/aos.css">

  <link rel="stylesheet" href="../css/ionicons.min.css">

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../css/jquery.timepicker.css">


  <link rel="stylesheet" href="../css/flaticon.css">
  <link rel="stylesheet" href="../css/icomoon.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
</head>
<?php require_once "authoriz.php" ?>
<?php require_once "registration.php" ?>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="main">Tatiana Roi</a>
      <!--        --><? // if (isset($succ_message)) {
                      //            $site->alertMessage('Поздравляю', $succ_message, 'save');
                      //        } 
                      ?>
      <!--        --><? // if (isset($err_message)) {
                      //            $site->alertMessage('Ошибка', $err_message, 'error');
                      //        } 
                      ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="main" class="nav-link">Главная</a></li>
          <li class="nav-item"><a href="about" class="nav-link">Обо мне</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="portfolio" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Портфолио</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="portfolio">Портфолио</a>
              <a class="dropdown-item" href="portfolio-single">Блог</a>
            </div>
          </li>
          <? if ((!$user->loged)) { ?>
            <li class="nav-item cta"><a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter2" style="cursor: pointer;">Регистрация</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer;">Вход</a></li>
          <? } else { ?>
            <li class="nav-item"><a href="/?exit=1" class="nav-link" style="cursor: pointer;">Выход</a></li>
          <? } ?>
          <li class="nav-item cta"><a href="zapis" class="nav-link"><span>Запись</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <!-- <div class="js-fullheight"> -->
  <div class="hero-wrap js-fullheight">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <h1>Impress everyone around you</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="zapis" class="btn btn-primary btn-outline-white px-5 py-3">Запись</a></p>
        </div>
      </div>
    </div>
  </div>