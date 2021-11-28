<!DOCTYPE html>
<html lang="pt-br">

    <?php
    include_once('../controller_bd_restaurante.php');
    $cod_restaurante = $_GET['id'];
    $lista = $GLOBALS['linhas'];
    $count = 0;
    while($count < count($lista)){
        if($lista[$count]['id'] == $cod_restaurante){
            break;
        }
        $count +=1;
    }
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
                        <a class="nav-menu active" href="./reserva.html">Faça sua reserva!</a>
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
        <section class="bg-sushi">
            <div class="nome-logo-restaurante">
                <img class="logo rounded-circle" width="180px" src="../pictures/<?php echo $lista[$count]['logo']?>" alt="">
                <h3 class="nome-restaurante display-4 fw-bold"><?php echo $lista[$count]['nome']?></h3>
            </div>
        </section>
        <section id="sub-menu">
            <div class="row">
                <ul class="col-md-6">
                    <li class="">
                        <a href="./reserva.php?count=<?php echo $count?>">Fazer reserva</a>
                    </li>
                    <li class="">
                        <a href="">Ver cardápio</a>
                    </li> 
                    <li class="">
                        <a href="">Avaliar</a>
                    </li>
                </ul>
                <ul class="col-md-6">
                    <li><i class="star fas fa-star"></i>Atendimento: 4,9</li>
                    <li><i class="star fas fa-star"></i>Comida: 5,0</li>
                    <li><i class="star fas fa-star"></i>Ambiente: 4,8</li>
                </ul>
            </div>
        </section>
        <section id="informacoes-rest">
            <div class="row">
                <div class="col-md-3 align p-5">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Endereço:</h4>
                    <p> <?php echo $lista[$count]['logradouro']?> <br> 
                    <?php echo $lista[$count]['cidade']?> <?php echo $lista[$count]['estado']?> </p>
                </div>
                <div class="col-md-3 align p-5">
                    <i class="far fa-clock"></i>
                    <h4>Funcionamento:</h4>
                    <p> <?php echo $lista[$count]['diasDaSemana']?><br> 
                    <?php echo $lista[$count]['horarioAbrir']?> às <?php echo $lista[$count]['horarioFechar']?></p>
                </div>
                <div class="col-md-3 align p-5">
                    <i class="fas fa-phone-alt"></i>
                    <h4>Contato:</h4>
                    <p> <?php echo $lista[$count]['tel']?><br> 
                        @<?php echo $lista[$count]['nome']?> </p>
                </div>
                <div class="col-md-3 align p-5">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h4> Formas de pagamento:</h4>
                    <p> <?php echo $lista[$count]['formasDePagamento']?><br></p>
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