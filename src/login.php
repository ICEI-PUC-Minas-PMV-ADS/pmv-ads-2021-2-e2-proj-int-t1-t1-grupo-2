<?php

if(isset($_POST['submit'])){
    
    include_once('config.php');

    $options = [
        'cost' => 12,
    ];

    $email = $_POST['emailCliente'];
    $senha = $_POST['senhaCliente'];

    $dados = mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email'");
    // transforma os dados em um array
    $linha = mysqli_fetch_assoc($dados);
    if(mysqli_num_rows($dados) == 1){
        if (password_verify($senha, $linha['senha'])) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $linha['usuario'];
            $_SESSION['email'] = $linha['email'];
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['cpf'] = $linha['cpf'];
            $_SESSION['data_nascimento'] = $linha['data_nascimento'];
            echo "<script>
            alert('Seja Bem-Vindo Novamente!'); location= './buscar-restaurantes.php';
            </script>";
        }else{
            echo "<script>
            alert('Email ou Senha incorreto!'); location= './login.html';
            </script>";
        }
    }else {
        echo "<script>
        alert('Email ou Senha incorreto!'); location= './login.html';
        </script>";
    }
    mysqli_close($conexao);
}

?>