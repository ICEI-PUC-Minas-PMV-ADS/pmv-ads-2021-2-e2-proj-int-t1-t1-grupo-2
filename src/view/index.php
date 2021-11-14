<!DOCTYPE html>
<html lang="pt-br">

<?php

session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {

    $logado = true;

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
            <a class="navbar-brand" href="./index.html"><img src="img/logo-dinner.png" alt="" width="200"></a>
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
                    <a class="nav-menu active" href="./reserva.php">Faça sua reserva!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-menu" href="./cadastro-restaurante.html">Cadastre seu restaurante</a>
                </li>
                </ul>
                <ul class="d-flex">
                  <?php if ($logado == false): ?>
                    <button onclick="window.location.href = './cadastro-cliente.html'" class="btn btn-cadastro-usuario" type="button" id="btn_cadastre-se">Cadastre-se</button>
                    <button href="" class="btn btn-login" type="button">Login</button>
                <?php else:?>
                    <button onclick="window.location.href = './perfil-cliente.html'" class="btn btn-cadastro-usuario" type="button" id="minha_conta">Minha Conta</button>
                    <button onclick="window.location.href = './sair.php'" class="btn btn-login" type="button">Sair</button>
                <?php endif ?>                  
              </ul>
            </div>
            </div>
        </nav>
    </header>

    <main>
      <section id= "busca-home" class="background-home">
        <div class="container">
          <div class="row d-flex justify-content-end">            
            <div class="col-9 position-relative overflow-hidden ">
              <h1 class="display-4 fw-bold">Reserve os melhores restaurantes</h1>
            </div>
            <div>
              <form class="input-home">
                <div class="mb-3">
                  <label class="form-label"></label>
                  <input type="text" class="form-control" id="text-busca-home" required="">
                </div>
              </form>
            </div>
            <div class="btn-home col-9 position-relative overflow-hidden">
              <button onclick="window.location.href = './busca-restaurantes.html'" type="submit" class="btn btn-buscar">Buscar</button>         
            </div>        
          </div>
        </div>      
      </section>
      <section id="depoimentos-home">
        <h1 class="display-5 fw-bold">Agora ficou muito mais fácil encontrar o restaurante ideal e fazer sua reserva.</h1>
        <h3 class="display-6">Veja o depoimento de alguns de nossos usuários:</h3>
        <div class="row">
          <div class="col-lg-6 d-flex justify-content-center align-items-center py-3">
            <img class="" width="50%" src="./img/depoimento-pedro.png">
          </div>
          <div class="col-lg-6 d-flex justify-content-center align-items-center py-3">
            <img class="" width="50%" src="./img/depoimento-claudia.png">
          </div>
        </div>
      </section>
      <section id="cadastro-home">
        <h2 class="display-5 fw-bold">Faça seu cadastro, é grátis!!!</h2>
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-5 d-flex justify-content-center align-items-center pb-4">
            <button type="submit" onclick="window.location.href = './cadastro-cliente.html'" class="btn btn-buscar">Sou cliente!</button>
          </div>
          <div class="col-lg-5 d-flex justify-content-center align-items-center pb-4">
            <button type="submit" onclick="window.location.href = './cadastro-restaurante.html'" class="btn btn-buscar">Cadastrar restaurante!</button>
          </div>
        </div>
      </section>
    </main>

    <footer>
        <div id="footer-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <a><h3>Dinner Boss</h3></a>
                    </div>
                    <div class="col-md-6 footer-sociais">
                        <a class="link-sociais" href="#"><i class="fab fa-whatsapp"></i></a>
                        <a class="link-sociais" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="link-sociais" href="#"><i class="fab fa-instagram"></i></a>
                    </div>                            
                </div>
            </div>
        </div>
    </footer>
 </body>
</html>
