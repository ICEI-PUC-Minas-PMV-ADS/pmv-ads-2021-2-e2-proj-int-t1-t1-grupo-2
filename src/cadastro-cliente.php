<?php

if(isset($_POST['submit'])){
    
    include_once('config.php');

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
        alert('Email já cadastrado!'); location= './view/cadastro-cliente.html';
        </script>";
    }else if($verificarSeExisteCpf == 1){
        echo "<script>
        alert('CPF já cadastrado!'); location= './view/cadastro-cliente.html';
        </script>";
    }else
    {
    //faz o cadastro do novo usuario no banco de dados!
        $inserir = mysqli_query($conexao,"INSERT INTO cliente(nome,email,cpf,data_nascimento,foto,usuario,senha) 
        values ('$nome','$email','$cpf','$dataNascimento','$foto','$usuario','$senha')");

        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;

        echo "<script>
        alert('Cadastrado com sucesso!'); location= './view/buscar-restaurantes.php';
        </script>";
        }
    mysqli_close($conexao);
}



?>