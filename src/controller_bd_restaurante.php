<?php

include_once('config.php');

if(isset($_POST['cadastrar'])){

    $nome = $_POST['nomeRestaurante'];
    $logo = $_POST['logoRestaurante'];
    $cnpj = $_POST['cnpjRestaurante'];
    $tel = $_POST['telRestaurante'];
    $redeSocial = $_POST['redeSocialRestaurante'];
    $site = $_POST['siteRestaurante'];
    $email = $_POST['emailRestaurante'];
    $logradouro = $_POST['logradouroRestaurante'];
    $bairro = $_POST['bairroRestaurante'];
    $cidade = $_POST['cidadeRestaurante'];
    $cep = $_POST['cepRestaurante'];
    $estado = $_POST['estadoRestaurante'];
    $horarioAbrir = $_POST['horarioAbrirRestaurante'];
    $horarioFechar = $_POST['horarioFecharRestaurante'];
    $diasDaSemana = $_POST['diasDaSemanaRestaurante'];
    $diasDaSemanaTexto = '';
    $formasDePagamento = $_POST['formasDePagamento'];
    $formasDePagamentoTexto = '';


    //faz a consulta no BD e contabiliza quantos dados foram encontrados
    $verificarSeExisteCnpj = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM estabelecimento WHERE cnpj = '$cnpj'"));
    $verificarSeExisteEmail = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM estabelecimento WHERE email = '$email'"));
    if($verificarSeExisteEmail == 1){
        echo "<script>
        alert('Email já cadastrado!'); window. history. back();
        </script>";
    }else if($verificarSeExisteCnpj == 1){
        echo "<script>
        alert('CNPJ já cadastrado!'); window. history. back();
        </script>";
    }else
    {

    foreach($diasDaSemana as $chk1)  
    {  
      $diasDaSemanaTexto .= $chk1.",";  
    }
    foreach($formasDePagamento as $chk2)  
    {  
      $formasDePagamentoTexto .= $chk2.",";  
    } 

   //faz o cadastro do novo usuario no banco de dados!
    if(mysqli_query($conexao,"INSERT INTO estabelecimento(nome,logo,cnpj,tel,redeSocial,site,email,logradouro,bairro,cidade,
    cep,estado,horarioAbrir,horarioFechar,diasDaSemana,formasDePagamento) 
    values ('$nome','$logo','$cnpj','$tel','$redeSocial','$site','$email','$logradouro','$bairro','$cidade','$cep','$estado','$horarioAbrir',
    '$horarioFechar','$diasDaSemanaTexto','$formasDePagamentoTexto')"))
    {
        echo "<script>
        alert('Restaurante Cadastrado com sucesso!'); location= './view/buscar-restaurantes.php';
        </script>";
        } else{
            echo "ERRO: $sql. " . mysqli_error($conexao);
        }  
    }
    mysqli_close($conexao);
}

//LOGIN DOS USUÁRIOS
if(isset($_POST['entrar'])){
    
    $options = [
        'cost' => 12,
    ];

    $email = $_POST['emailCliente'];
    $senha = $_POST['senhaCliente'];

    $dados = mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email'");
    if(mysqli_num_rows($dados) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        // verifica se a senha é correspondente
        if (password_verify($senha, $linha['senha'])) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $linha['usuario'];
            $_SESSION['email'] = $linha['email'];
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['cpf'] = $linha['cpf'];
            $_SESSION['data_nascimento'] = $linha['data_nascimento'];
            echo "<script>
            alert('Seja Bem-Vindo Novamente!'); location= './view/buscar-restaurantes.php';
            </script>";
        }else{
            echo "<script>
            alert('Senha incorreta!'); location= './view/login.html';
            </script>";
        }
    }else{
        echo "<script>
        var resultado = confirm('Email não cadastrado, deseja se cadastrar?');
        if(resultado == true){
            location= './view/cadastro-cliente.html';
        }else{
            location= './view/login.html';
        }
        </script>";
    }
    mysqli_close($conexao);
}

//EXCLUIR USUÁRIO
if(isset($_POST['delete'])){
    
    $options = [
        'cost' => 12,
    ];

    $email = $_POST['emailCliente'];
    $cpf = $_POST['cpfCliente'];
    $senha = $_POST['senhaCliente'];

    $dados = mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email' AND cpf = '$cpf'");
    if(mysqli_num_rows($dados) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        if (password_verify($senha, $linha['senha'])) {
            $senha_verificada = $linha['senha'];
            if(mysqli_query($conexao,"DELETE FROM cliente WHERE email = '$email' AND cpf = '$cpf' AND senha = '$senha_verificada'")){
                session_start();
                session_destroy();
                echo "<script>
                alert('Conta Excluida com Sucesso!'); location= './view/index.php';
                </script>";
            }
        }else{
            echo "<script>
            alert('Senha incorreta!'); location= './view/perfil-cliente.php';
            </script>";
        }
    }
    mysqli_close($conexao);
}

//ATUALIZAR DADOS DO USUÁRIO
if(isset($_POST['atualizar'])){
    
    $options = [
        'cost' => 12,
    ];

    $nome = $_POST['nomeCliente'];
    $usuario = $_POST['usuarioCliente'];
    $dataNascimento = $_POST['dataNasCliente'];
    $email = $_POST['emailCliente'];
    $cpf = $_POST['cpfCliente'];
    $senha = $_POST['senhaCliente'];

    $dados = mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email' AND cpf = '$cpf'");
    if(mysqli_num_rows($dados) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        if (password_verify($senha, $linha['senha'])) {
            if(mysqli_query($conexao,"UPDATE cliente SET nome = '$nome', data_nascimento = '$dataNascimento', usuario = '$usuario' WHERE email = '$email' AND cpf = '$cpf'")){
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['nome'] = $nome;
                $_SESSION['data_nascimento'] = $dataNascimento;
                echo "<script>
                alert('Conta Atualizada com Sucesso!'); location= './view/perfil-cliente.php';
                </script>";
            }
        }else{
            echo "<script>
            alert('Senha incorreta!'); location= './view/perfil-cliente.php';
            </script>";
        }
    }
    mysqli_close($conexao);
}

?>