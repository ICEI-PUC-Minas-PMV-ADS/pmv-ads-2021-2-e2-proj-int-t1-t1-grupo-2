<!DOCTYPE html>
<html lang="pt-br">

<?php

include_once('../controller_bd_reserva.php');
include_once('../controller_bd_restaurante.php');
$lista = $GLOBALS['linhas'];
$count2 = 0;
$count = 0;

session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    $logado = true;

    if($_SESSION['perfil'] == "empresario"){
      header('Locatio: ./buscar-restaurantes.php');
    }

    if($_SESSION['reservas'] == null){
      $linhasReserva = array();
    }else{
      $linhasReserva = $_SESSION['reservas'];
      while($count2 < count($lista)){
        if($linhasReserva[$count]['estabelecimento_id'] == $lista[$count2]['id']){
            break;
        }
        $count2 +=1;
      }
    }

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
          <th scope="col">Restaurante</th>
          <th scope="col">Mesa</th>
          <th scope="col">Endereço</th>
          <th scope="col">Horário</th>
          <th scope="col">Data</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($linhasReserva != null): ?>
        <?php while($count < count($linhasReserva)){?>
        <tr>
            <td>
                <?php echo $lista[$count2]['nome']?>
            </td>
            <td>
                <?php echo $linhasReserva[$count]['mesa_id'];?>
            </td>
            <td>
              <?php echo $lista[$count2]['logradouro']?> <?php echo $lista[$count2]['cidade']?> <?php echo $lista[$count2]['estado']?> </p>
            </td>
            <td>
              <?php echo $linhasReserva[$count]['horario'];?>
            </td>
            <td>
              <?php echo date($linhasReserva[$count]['data']);?>
            </td>
            <td>
              <a class="btn btn-primary" href='../controller_bd_reserva.php?delete=true&id=<?php echo $linhasReserva[$count]['id'];?>&count=<?php echo $count;?>'>Cancelar</a>
            </td>
          </tr>
          <?php $count += 1; } ?>
          <?php endif ?>
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