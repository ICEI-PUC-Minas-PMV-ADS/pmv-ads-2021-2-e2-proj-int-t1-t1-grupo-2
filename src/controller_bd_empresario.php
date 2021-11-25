<?php

include_once('config.php');

//CADASTRO DE NOVOS USUÁRIOS
if(isset($_POST['cadastrar'])){
    
    $options = [
        'cost' => 12,
    ];

    $nome = $_POST['nomeCliente'];
    $email = $_POST['emailCliente'];
    $foto = $_POST['fotoCliente'];
    $cpf = $_POST['cpfCliente'];
    $dataNascimento = $_POST['dataNasCliente'];
    $tel = $_POST['telCliente'];
    $cel = $_POST['celCliente'];
    $usuario = $_POST['usuarioCliente'];
    //codifica a senha para maior segurança
    $senha = password_hash($_POST['senhaCliente'], PASSWORD_BCRYPT, $options);

    
    //faz a consulta no BD e contabiliza quantos dados foram encontrados
    $verificarSeExisteEmail = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email'"));
    $verificarSeExisteCpf = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM cliente WHERE cpf = '$cpf'"));
    if($verificarSeExisteEmail == 1){
        echo "<script>
        var resultado = confirm('Email já cadastrado, deseja entrar?');
        if(resultado == true){
            location= './view/login.html';
        }else{
            location= './view/cadastro-cliente.html';
        }
        </script>";
    }else if($verificarSeExisteCpf == 1){
        echo "<script>
        var resultado = confirm('CPF já cadastrado, deseja entrar?');
        if(resultado == true){
            location= './view/login.html';
        }else{
            location= './view/cadastro-cliente.html';
        }
        </script>";
    }else
    {
    //faz o cadastro do novo usuario no banco de dados!
    if(mysqli_query($conexao,"INSERT INTO cliente(nome,email,cpf,data_nascimento,foto,usuario,senha) 
    values ('$nome','$email','$cpf','$dataNascimento','$foto','$usuario','$senha')") AND (mysqli_query($conexao,"INSERT INTO telefone(numero) 
    values ('$tel'), ('$cel')"))){
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['data_nascimento'] = $dataNascimento;
        $_SESSION['celular'] = $cel;
        $_SESSION['telefone'] = $tel;

        echo "<script>
        alert('Cadastrado com sucesso!'); location= './view/buscar-restaurantes.php';
        </script>";
        } else{
            echo "ERRO: " . mysqli_error($conexao);
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