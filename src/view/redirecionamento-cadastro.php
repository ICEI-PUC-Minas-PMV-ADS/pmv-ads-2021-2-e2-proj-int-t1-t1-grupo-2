<!DOCTYPE html>
<html lang="pt-br">

  <?php

  session_start();
  if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
  
      $logado = true;
      header('Location: ./buscar-restaurantes');
      
  
  } else {
  
      $logado = false;
  }
  
  ?>
  
  
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <title>Dinner Boss</title>
  
      <!-- Estilos -->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
      <link href="css/style.css" rel="stylesheet" type="text/css" />
      
      <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
          integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
          crossorigin="anonymous"></script>
      <script src="js/script.js"></script>    
      <script src="https://kit.fontawesome.com/92fd3400ef.js" crossorigin="anonymous"></script>
      </head>
  
  <body>
      <header>
          <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="./index.php"><img src="img/logo-dinner.png" alt="" width="200"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <a class="nav-menu" aria-current="page" href="./buscar-restaurantes.php">Restaurantes</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-menu active" href="./reserva.php">Fa??a sua reserva!</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-menu" href="./cadastro-restaurante.php">Cadastre seu restaurante</a>
                      </li>
                  </ul>
                  <ul class="d-flex">
                      <button onclick="window.location.href = './login.html'" class="btn btn-login" type="button">Entrar</button>
                  </ul>
              </div>
          </nav>
      </header>

  <main>
    <section id="form-cadastro-cliente">
      <div class="col-sm-9 col-md-12 col-lg-10 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Escolha seu tipo de Perfil!</h5>
            <div class="col text-center">
              <button type="button" onclick="window.location.href = './cadastro-cliente.html'" class="btn btn-cadastro mb-3 col-md-6 mt-4">Cliente</button>
              <button type="button" onclick="window.location.href = './cadastro-empresario.html'" class="btn btn-cadastro mb-3 col-md-6 mt-4">Empres??rio</button>
            </div>
          </div>
        </div>
      </div>
  </main>
  <footer class="fixed-bottom">
        <div class="row">
          <div class="col-md-6">
            <a>
              <h3>Dinner Boss</h3>
            </a>
          </div>
          <div class="col-md-6 footer-sociais">
            <a class="link-sociais" href="#"><i class="fab fa-whatsapp"></i></a>
            <a class="link-sociais" href="#"><i class="fab fa-twitter"></i></a>
            <a class="link-sociais" href="#"><i class="fab fa-instagram"></i></a>
          </div>
    </div>
  </footer>

</body>

</html>