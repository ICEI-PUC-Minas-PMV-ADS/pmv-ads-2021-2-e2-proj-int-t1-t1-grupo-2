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
      <section id="form-reserva">
        <div class="col-md-12">
          <div class="form-rest">
          <form>
            <h2 class="display-6 fw-bold mb-3 titulo-form-cadastro">Reserve sua mesa!</h2>

              <div class="row">
                <div class="mb-3 col-md-12">
                  <label for="nomeClienteReserva" class="form-label text-form-cadastro">Nome do cliente</label>
                  <input type="text" class="form-control form-cadastro-input" id="nomeClienteReserva" required>
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="telClienteReserva" class="form-label text-form-cadastro">Telefone</label>
                  <input type="tel" class="form-control form-cadastro-input" id="telClienteReserva" placeholder="(__)_____-_____" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="emailCliente" class="form-label text-form-cadastro">Email</label>
                  <input type="email" class="form-control form-cadastro-input" id="emailCliente" placeholder="exemplo@exemplo.com.br" required>
                </div>       
              </div>
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="restauranteReserva" class="form-label text-form-cadastro">Restaurante</label>
                  <select class="form-select form-cadastro-input"  id="restauranteReserva" required>
                    <option>Escolher...</option>
                    <option>Pizza Time</option>                    
                  </select>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="mesaReserva" class="form-label text-form-cadastro">Mesa</label>
                  <select class="form-select form-cadastro-input" id="mesaReserva" required>
                    <option>Escolher...</option>
                    <option>Mesa 1</option>
                    <option>Mesa 2</option>
                    <option>Mesa 3</option>                    
                  </select>
                </div>
              </div>                                              
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="dataReserva" class="form-label text-form-cadastro">Data</label>
                  <input type="text" class="form-control form-cadastro-input" id="dataReserva" placeholder="__/__/____" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="horarioReserva" class="form-label text-form-cadastro">Horário</label>
                  <input type="text" class="form-control form-cadastro-input" id="horarioReserva" required>
                </div>                
              </div>  
              <div class="row">
                <div class="mb-3 col-md-6 mapa-mesas">
                  <a href="">Mapa das mesas</a>
                </div>
                <div class="mb-3 col-md-6">
                  <button type="submit" class="btn btn-cadastro mb-3 col-md-6 mt-4">Reservar</button>
                </div>
              </div>                                                           
          </form> 
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
