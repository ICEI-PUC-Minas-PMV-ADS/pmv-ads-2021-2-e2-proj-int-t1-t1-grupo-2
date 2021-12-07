<!DOCTYPE html>
<html lang="pt-br">

dynamic logado = null;
			CommonFunctions.session_start();
			if((XVar)(XSession.Session.KeyExists("logado"))  && (XVar)(XSession.Session["logado"] == true))
			{
				logado = new XVar(true);
				if(XSession.Session["perfil"] == "empresario")
				{
					MVCFunctions.HeaderRedirect("./perfil-empresario.php");
				}
			}
			else
			{
				MVCFunctions.HeaderRedirect("./login.html");
				logado = new XVar(false);
			}
			return null;

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
                  <button onclick="window.location.href = './meus-restaurantes.php'" class="btn btn-cadastro-usuario" type="button">Meu(s) restaurante(s)</button>   
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
        <div class="card border-0 shadow rounded-3 ">
          <div class="card-body p-4 p-sm-2">
            <div class="form-rest">
              <form action='../controller_bd_empresario.php' method="POST">
