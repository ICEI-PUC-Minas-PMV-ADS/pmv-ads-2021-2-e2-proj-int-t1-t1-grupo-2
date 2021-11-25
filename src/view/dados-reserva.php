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
                    <a class="nav-menu" aria-current="page" href="./busca-restaurantes.html">Restaurantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-menu active" href="./reserva.html">Faça sua reserva!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-menu" href="./cadastro-restaurante.html">Cadastre seu restaurante</a>
                </li>
                </ul>
                <ul class="d-flex">
                  <?php if ($logado == false): ?>
                    <button onclick="window.location.href = './cadastro-cliente.html'" class="btn btn-cadastro-usuario" type="button" id="btn_cadastre-se">Cadastre-se</button>
                    <button href="" class="btn btn-login" type="button">Entrar</button>
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
      <table class="table table-striped">
      <thead>
        <tr>
          <th>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </div>
          </th>
          <th scope="col">Restaurante</th>
          <th scope="col">Dia</th>
          <th scope="col">Horário</th>
          <th scope="col">Mesa</th>
          <th scope="col">Cliente</th>
          <th scope="col">Contato</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </div>
          </td>
          <td>Pizzaria</td>
          <td>25/10</td>
          <td>19h</td>
          <td>05</td>
          <td>Cláudia Moura</td>
          <td>(31) 99678-4520</td>
        </tr>
        <tr>
          <td>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </div>
          </td>
          <td>Pizzaria</td>
          <td>2/10</td>
          <td>21h</td>
          <td>02</td>
          <td>Cláudia Moura</td>
          <td>(31) 99678-4520</td>
        </tr>
        <tr>
          <td>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </div>
          </td>
          <td>Pizzaria</td>
          <td>04/10</td>
          <td>23h</td>
          <td>08</td>
          <td>Cláudia Moura</td>
          <td>(31) 99678-4520</td>
        </tr>
        </tbody>
      </table>
    </main> 
    <footer class="fixed-bottom">
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
    </footer>
</body> 
</html>
