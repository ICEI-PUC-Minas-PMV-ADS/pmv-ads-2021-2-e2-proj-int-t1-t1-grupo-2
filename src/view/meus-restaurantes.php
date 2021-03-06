<!DOCTYPE html>
<html lang="pt-br">

<?php

include '../config.php';


session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    
    $logado = true;

    if($_SESSION['perfil'] == "cliente"){
      header('Location: ./buscar-restaurantes.php');
    }

    if($_SESSION['estabelecimentos'] == null){
      $linhas = [];
    }else{
      $linhas = $_SESSION['estabelecimentos'];
    }
    $count = 0;
    
    
    
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
                        <a class="nav-menu active" href="./reserva.php">Fa??a sua reserva!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-menu" href="./cadastro-restaurante.php">Cadastre seu restaurante</a>
                    </li>
                </ul>
                <ul class="d-flex">
                <?php if ($logado == false): ?>
                    <button onclick="window.location.href = './redirecionamento-cadastro.php'" class="btn btn-cadastro-usuario" type="button" id="btn_cadastre-se">Cadastre-se</button>
                    <button onclick="window.location.href = './login.html'" class="btn btn-login" type="button">Entrar</button>
                <?php else:?>
                    <button onclick="window.location.href = './perfil-<?php echo $_SESSION['perfil']?>.php'" class="btn btn-cadastro-usuario" type="button" id="minha_conta">Minha Conta</button>
                    <button onclick="window.location.href = '../sair.php'" class="btn btn-login" type="button">Sair</button>
                <?php endif ?>
                </ul>
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
          <th scope="col">Nome</th>
          <th scope="col">CNPJ</th>
          <th scope="col">Endere??o</th>
          <th scope="col">Hor??rio</th>
        </tr>
        </thead>
        <tbody>
        <?php while($count < count($linhas)){?>
        <tr>
          <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              </div>
            </td>
            <td>
                <?php echo $linhas[$count]['nome']?>
            </td>
            <td>
                <?php echo $linhas[$count]['cnpj'];?>
            </td>
            <td>
                <?php echo $linhas[$count]['logradouro']." ".$linhas[$count]['bairro']." ".$linhas[$count]['cidade']." ".$linhas[$count]['estado']." ".$linhas[$count]['cep'] ?>
            </td>
            <td>
                <?php echo $linhas[$count]['horarioAbrir']." ".$linhas[$count]['horarioFechar'];?>
            </td>
          </tr>
          <?php $count += 1; } ?>
          <tr>
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