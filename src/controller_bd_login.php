<?php

include_once('config.php');


//LOGIN DOS USUÁRIOS
if(isset($_POST['entrar'])){
    
    $options = [
        'cost' => 12,
    ];

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $cliente = mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email'");
    $empresario = mysqli_query($conexao,"SELECT * FROM empresario WHERE email = '$email'");
    if(mysqli_num_rows($cliente) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($cliente);
        // verifica se a senha é correspondente
        if (password_verify($senha, $linha['senha'])) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['id'] = $linha['id'];
            $_SESSION['perfil'] = 'cliente';
            $_SESSION['usuario'] = $linha['usuario'];
            $_SESSION['email'] = $linha['email'];
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['cpf'] = $linha['cpf'];
            $_SESSION['cel'] = $linha['tel'];
            $_SESSION['data_nascimento'] = $linha['data_nascimento'];
            $_SESSION['foto'] = "pictures/{$linha['foto']}";
            echo "<script>
            alert('Seja Bem-Vindo Novamente!'); location= './view/buscar-restaurantes.php';
            </script>";
        }else{
            echo "<script>
            alert('Senha incorreta!'); window. history. back();
            </script>";
        }
    }else if(mysqli_num_rows($empresario) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($empresario);
        // verifica se a senha é correspondente
        if (password_verify($senha, $linha['senha'])) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['id'] = $linha['id'];
            $_SESSION['perfil'] = 'empresario';
            $_SESSION['usuario'] = $linha['usuario'];
            $_SESSION['email'] = $linha['email'];
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['cnpj'] = $linha['cnpj'];
            $_SESSION['data_nascimento'] = $linha['data_nascimento'];
            $_SESSION['foto'] = "pictures/{$linha['foto']}";
            $_SESSION['estabelecimentos'] = [];
            $empresario_id = $linha['id'];
            $dados = mysqli_query($conexao,"SELECT * FROM estabelecimento WHERE empresario_id = '$empresario_id'");
            if(mysqli_num_rows($dados) >= 1){
            while($li = $dados->fetch_array())
            {
            $linhas[] = $li;
            }
            $_SESSION['estabelecimentos'] = $linhas;
            }
            echo "<script>
            alert('Seja Bem-Vindo Novamente!'); location= './view/buscar-restaurantes.php';
            </script>";
        }else{
            echo "<script>
            alert('Senha incorreta!'); window. history. back();
            </script>";
        }
    }else{
        echo "<script>
        var resultado = confirm('Email não cadastrado, deseja se cadastrar?');
        if(resultado == true){
            location= './view/cadastro-cliente.html';
        }else{
            window. history. back();
        }
        </script>";
    }
    mysqli_close($conexao);
}

?>