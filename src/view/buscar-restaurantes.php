<!DOCTYPE html>
<html lang="pt-br">


<?php

include_once('../controller_bd_restaurante.php');
$lista = $GLOBALS['linhas'];
$count = 0;
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
            <a class="navbar-brand" href="./index.php"><img src="img/logo-dinner.png" alt="" width="200"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-menu" aria-current="page" href="#">Restaurantes</a>
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
                    <button onclick="window.location.href = './cadastro-cliente.html'" class="btn btn-cadastro-usuario" type="button" id="btn_cadastre-se">Cadastre-se</button>
                    <button href="" class="btn btn-login" type="button">Entrar</button>
                <?php else:?>
                    <button onclick="window.location.href = './perfil-<?php echo $_SESSION['perfil']?>.php'" class="btn btn-cadastro-usuario" type="button" id="minha_conta">Minha Conta</button>
                    <button onclick="window.location.href = '../sair.php'" class="btn btn-login" type="button">Sair</button>
                <?php endif ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <div class="col-md-12">
                <div class="form-rest">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="nomeRestaurante" class="form-label text-form-cadastro">Nome do
                                    restaurante:</label>
                                <input type="text" class="form-control form-cadastro-input" id="nomeRestaurante"
                                    required>
                            </div>
                            <div class="mb-3 col-md-3">
                                <button type="submit" class="btn btn-buscar mt-4">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
            <?php if ($lista != null): ?>
                <?php while($count < count($lista)){?>
                <div class="col-md-3 logo-nome">
                    <a class="text-decoration-none" href="./perfil-restaurante.php?id=<?php echo $lista[$count]['id']?>">
                        <img class="busca-logos rounded-circle" src="../pictures/<?php echo $lista[$count]['logo']?>">
                        <p class="busca-nome"><?php echo $lista[$count]['nome']?></p>
                    </a>
                </div>
            <?php $count +=1;}?>
            <?php else:?>
                <h3>Ainda não temos nenhum estabelecimento cadastrado ;(</h3>
            <?php endif ?>
            </div>
        </section>
    </main>
    <footer>
        <div id="footer-areas">
            <div class="container-fluid">
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
            </div>
        </div>
    </footer>
</body>
</html>