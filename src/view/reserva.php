<!DOCTYPE html>
<html lang="pt-br">

<?php
    include_once('../controller_bd_restaurante.php');
    if(!isset($_GET['count'])){
      header('Location: ./buscar-restaurantes.php');

    }
$cod_count = $_GET['count'];
$lista = $GLOBALS['linhas'];
$count = 0;
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    
    $logado = true;
    
} else {
    $logado = false;
    header('Location: ./login.html');
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
                    <a class="nav-menu active" href="./reserva.php">Faça sua reserva!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-menu" href="./cadastro-restaurante.php">Cadastre seu restaurante</a>
                </li>
                </ul>
                <ul class="d-flex">
                    <button onclick="window.location.href = './perfil-<?php echo $_SESSION['perfil']?>.php'" class="btn btn-cadastro-usuario" type="button" id="minha_conta">Minha Conta</button>
                    <button onclick="window.location.href = '../sair.php'" class="btn btn-login" type="button">Sair</button>
              </ul>
            </div>
            </div>
        </nav>
    </header>
    <main>
      <section id="form-reserva">
        <div class="col-md-12">
          <div class="form-rest">
          <form action="../controller_bd_reserva.php" method="post">
            <h2 class="display-6 fw-bold mb-3 titulo-form-cadastro">Reserve sua mesa!</h2>
            <input type="hidden" readonly name="restauranteId" value="<?php echo $lista[$cod_count]['id']?>">
              <div class="row">
                <div class="mb-3 col-md-12">
                  <label for="nomeClienteReserva" class="form-label text-form-cadastro">Nome do cliente</label>
                  <input readonly type="text" class="form-control form-cadastro-input" name="nomeClienteReserva" value="<?php echo $_SESSION['nome']?>" required>
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="telClienteReserva" class="form-label text-form-cadastro">Telefone</label>
                  <input readonly type="tel" class="form-control form-cadastro-input" name="telClienteReserva" value="<?php echo $_SESSION['cel']?>" placeholder="(__)_____-_____" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="emailClienteReserva" class="form-label text-form-cadastro">Email</label>
                  <input readonly type="email" name="emailClienteReserva" class="form-control form-cadastro-input" value="<?php echo $_SESSION['email']?>" required>
                </div>       
              </div>
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label class="form-label text-form-cadastro">Restaurante</label>
                  <input readonly type="text" class="form-control form-cadastro-input" name="restauranteReserva" value="<?php echo $lista[$cod_count]['nome']?>" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="mesaReserva" class="form-label text-form-cadastro">Mesa</label>
                  <select class="form-select form-cadastro-input" name="mesaClienteReserva" required>
                    <option></option>
                    <?php while($count < $lista[$cod_count]['qtdMesa']){ ?>
                    <option value="<?php echo $count+1; ?>">Mesa <?php echo $count+1; ?></option>      
                    <?php $count+=1;}?>             
                  </select>
                </div>
              </div>                                              
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="dataClienteReserva" class="form-label text-form-cadastro">Data</label>
                  <input type="date" class="form-control form-cadastro-input" name="dataClienteReserva" placeholder="__/__/____" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="horarioCReserva" class="form-label text-form-cadastro">Horário (de <?php echo str_replace("h",":",$lista[$cod_count]['horarioAbrir'])?> as  <?php echo str_replace("h",":",$lista[$cod_count]['horarioFechar'])?>)</label>
                  <input name="horarioClienteReserva" type="time" min="<?php echo str_replace("h",":",$lista[$cod_count]['horarioAbrir'])?>" max="<?php echo str_replace("h",":",$lista[$cod_count]['horarioFechar'])?>"class="form-control form-cadastro-input" id="horarioReserva" required>
                </div>                
              </div>
              <div class="row">
                <div class="mb-3 col-md-12">
                  <button type="subimit" name="reservar" class="btn btn-cadastro mb-3 col-md-6 mt-4">Reservar</button>
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