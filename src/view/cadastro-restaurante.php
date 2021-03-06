<!DOCTYPE html>
<html lang="pt-br">

    <?php

    session_start();
    if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    
        $logado = true;
        if($_SESSION['perfil'] == "cliente"){
            header('Location: ./buscar-restaurantes.php');
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
                        <a class="nav-menu active" href="./reserva.php">Fa??a sua reserva!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-menu" href="./cadastro-restaurante.php">Cadastre seu restaurante</a>
                    </li>
                </ul>
                <ul class="d-flex">
                <?php if ($logado == false): ?>
                    <button onclick="window.location.href = './cadastro-empresario.html'" class="btn btn-cadastro-usuario" type="button" id="btn_cadastre-se">Cadastre-se</button>
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
        <section id="form-cadastro-rest">
            <div class="col-md-12">
                <div class="form-rest">
                    <form action="../controller_bd_restaurante.php" method="post" enctype="multipart/form-data">
                        <h2 class="display-6 fw-bold mb-3 titulo-form-cadastro">Cadastre seu restaurante:</h2>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nomeRestaurante" class="form-label text-form-cadastro">Nome</label>
                                <input type="text" class="form-control form-cadastro-input" name="nomeRestaurante" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="fileLogo" class="form-label text-form-cadastro">Logo</label>
                                <input type="file" class="form-control form-control-sm form-cadastro-input" name="logoRestaurante" optional>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="cnpjRestaurante" class="form-label text-form-cadastro">CNPJ</label>
                                <input type="text" class="form-control form-cadastro-input" name="cnpjRestaurante" placeholder="__.___.___/____-__"required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="telRestaurante" class="form-label text-form-cadastro">Telefone</label>
                                <input type="tel" class="form-control form-cadastro-input" name="telRestaurante" placeholder="(__)_____-_____" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="socialRestaurante" class="form-label text-form-cadastro">Rede Social</label>
                                <input type="text" class="form-control form-cadastro-input" name="redeSocialRestaurante" >
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="siteRestaurante" class="form-label text-form-cadastro">Site</label>
                                <input type="text" class="form-control form-cadastro-input" name="siteRestaurante" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="emailRestaurante" class="form-label text-form-cadastro ">Email</label>
                            <input type="email" class="form-control form-cadastro-input" name="emailRestaurante" placeholder="exemplo@exemplo.com.br" required>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="enderecoRestaurante" class="form-label text-form-cadastro">Logradouro</label>
                                <input type="text" class="form-control form-cadastro-input" name="logradouroRestaurante" required>
                            </div>
                          
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="bairroRestaurante" class="form-label text-form-cadastro">Bairro</label>
                                <input type="text" class="form-control form-cadastro-input" name="bairroRestaurante" required>
                            </div>
                            
                            <div class="mb-3 col-md-4">
                                <label for="cidadeRestaurante" class="form-label text-form-cadastro">Cidade</label>
                                <input type="text" class="form-control form-cadastro-input" name="cidadeRestaurante" required>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="cepRestaurante" class="form-label text-form-cadastro">Cep</label>
                                <input type="text" class="form-control form-cadastro-input" name="cepRestaurante" placeholder="_____-___" required>
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="estadoRestaurante" class="form-label text-form-cadastro">Estado (UF)</label>
                                <input type="text" class="form-control form-cadastro-input" name="estadoRestaurante" required>
                            </div>
                        </div>    

                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="horarioAbrirRestaurante" class="form-label text-form-cadastro">Hor??rio de abrir</label>
                                <input type="text" class="form-control form-cadastro-input" name="horarioAbrirRestaurante" placeholder="00h00" required>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="horarioFecharRestaurante" class="form-label text-form-cadastro">Hor??rio de fechar</label>
                                <input type="text" class="form-control form-cadastro-input" name="horarioFecharRestaurante" placeholder="00h00" required>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="horarioFecharRestaurante" class="form-label text-form-cadastro">Quantidade de Mesas</label>
                                <input type="number" min='0' class="form-control form-cadastro-input" name="qtdMesa" placeholder="12" required>
                            </div>
                        </div>    

                        <div class="row">
                            <label for="diaFuncionamentoRestaurante" class="form-label text-form-cadastro">Dias da semana</label>
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="diasDaSemanaRestaurante[]" value="Segunda-feira">
                                <label class="label-check" for="segundaFeira">Segunda-feira</label>
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">                                
                                <input class="input-check" type="checkbox" name="diasDaSemanaRestaurante[]" value="Ter??a-feira">
                                <label class="label-check" for="tercaFeira">Ter??a-feira</label>                                
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="diasDaSemanaRestaurante[]" value="Quarta-feira">
                                <label class="label-check" for="quartaFeira">Quarta-feira</label>
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="diasDaSemanaRestaurante[]" value="Quinta-feira">
                                <label class="label-check" for="quintaFeira">Quinta-feira</label>
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="diasDaSemanaRestaurante[]" value="Sexta-feira">
                                <label class="label-check" for="sextaFeira">Sexta-feira</label>
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="diasDaSemanaRestaurante[]" value="S??bado">
                                <label class="label-check" for="sabado">S??bado</label>
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="diasDaSemanaRestaurante[]" value="Domingo">
                                <label class="label-check" for="domingo">Domingo</label>
                            </div>                                                                               
                        </div>
                        <div class="row"> 
                            <label for="pagamentoRestaurante" class="form-label text-form-cadastro">Formas de pagamento</label>                            
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="formasDePagamento[]" value="Dinheiro">
                                <label class="label-check" for="dinheiro">Dinheiro</label>
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">                                
                                <input class="input-check" type="checkbox" name="formasDePagamento[]" value="Pix">
                                <label class="label-check" for="pix">Pix</label>                                
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="formasDePagamento[]" value="Cr??dito">
                                <label class="label-check" for="credito">Cr??dito</label>
                            </div>
                            <div class="form-check form-check-inline mb-3 col-md-2">
                                <input class="input-check" type="checkbox" name="formasDePagamento[]" value="D??bito">
                                <label class="label-check" for="debito">D??bito</label>
                            </div>                            
                        </div>                     
                    
                        <button type="submit" name="cadastrar" class="btn btn-cadastro col-md-3 mt-3">Cadastrar</button>
                    </form>
                </div>
 
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
