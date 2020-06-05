<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Главная</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style media="screen">
      .h100{
        min-height: 100vh;
      }
      .mar{
        margin-top: -222px;
      }
    </style>
  </head>
  <body class="grey lighten-4 ">
    <div class="h100">

    <header class="mb-4">
      <nav class="navbar  navbar-expand-lg navbar-dark pink scrolling-navbar">
        <a class="navbar-brand" href="#"><strong>Создание лендинга</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="#">Документы</a>
            </li>
          </ul>
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item active">
              <a class="nav-link" href="#">Загрузить документ</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div id="app" class="">
      <download-component/>
    </div>

  </div>

    <footer class="page-footer mar  font-small cyan darken-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 py-5">
            <div class="mb-5 flex-center">

              <a class="pin-ic" href="https://github.com/shrecksex/swamp">
                <i class="fab fa-github fa-lg white-text fa-2x"> </i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright text-center py-3">2020
      </div>
    </footer>

    <script src="/js/app.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
  </body>
</html>
