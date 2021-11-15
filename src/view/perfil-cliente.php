<!DOCTYPE html>
<html lang="pt-br">

<?php

session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    
    $logado = true;
    
} else {

    header("Location: login.html");
    
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
                        <a class="nav-menu" aria-current="page" href="#">Restaurantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-menu active" href="#">Faça sua reserva!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-menu" href="./cadastro-restaurante.html">Cadastre seu restaurante</a>
                    </li>
                </ul>
                <ul class="d-flex">
                    <button onclick="window.location.href = '../sair.php'" class="btn btn-login" type="button">Sair</button>
                </ul>
            </div>
            </div>
        </nav>
    </header>
 
 
    <body>
    <main>
    <section id="form-cadastro-cliente">
      <div class="col-sm-9 col-md-12 col-lg-10 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-0 fw-light fs-5">Minha Conta</h5>
            <div class="form-rest">
              <form action='../controller_bd.php' method="POST">
                
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="nomeCliente" class="form-label text-form-cadastro">Nome</label>
                    <input type="text" name="nomeCliente" class="form-control form-cadastro-input" id="nomeCliente"
                    value = '<?php echo $_SESSION['nome']?>' required>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="emailCliente" class="form-label text-form-cadastro">Email</label>
                    <input readonly type="email" name="emailCliente" class="form-control form-cadastro-input" id="emailCliente"
                      value = '<?php echo $_SESSION['email']?>' required>
                  </div>

                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="cpfCliente" class="form-label text-form-cadastro">CPF</label>
                    <input readonly type="text" name="cpfCliente" class="form-control form-cadastro-input" id="cpfCliente"
                      value = '<?php echo $_SESSION['cpf']?>' required>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="datanasCliente" class="form-label text-form-cadastro">Data de Nascimento</label>
                    <input type="text" name="dataNasCliente" class="form-control form-cadastro-input" id="datanascCliente"
                    value = '<?php echo $_SESSION['data_nascimento']?>' placeholder="__/__/____" required>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="telCliente" class="form-label text-form-cadastro">Telefone</label>
                    <input type="tel" name="telCliente" class="form-control form-cadastro-input" id="telCliente"
                      placeholder="(__)_____-_____" optional>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="celCliente" class="form-label text-form-cadastro">Celular</label>
                    <input type="tel" name="celCliente" class="form-control form-cadastro-input" id="celCliente"
                      placeholder="(__)_____-_____" optional>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="usuarioCliente" class="form-label text-form-cadastro">Usuário</label>
                    <input type="text" name="usuarioCliente" class="form-control form-cadastro-input" id="usuarioCliente"
                      value = '<?php echo $_SESSION['usuario']?>' required>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="senhaCliente" class="form-label text-form-cadastro">Alterar Senha</label>
                    <input type="password" name="senhaCliente" class="form-control form-cadastro-input" id="senhaCliente"
                      required>
                  </div>
                </div>
                <div class='btn-group'>
                    <button type="submit" name="delete"
                    class="btn btn-cadastro-google mb-3 col-md-6 mt-4">Excluir Conta</button>
                  <button type="submit" name="submit"
                    class="btn btn-cadastro mb-3 col-md-6 mt-4">Atualizar Dados</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>   
  </main>
 
    </body>
 
 
 
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