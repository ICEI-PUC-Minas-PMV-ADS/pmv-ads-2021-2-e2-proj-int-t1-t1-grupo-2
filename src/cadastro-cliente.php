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
    $verificarSeExiste = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email'"));
    if($verificarSeExiste == 1){
        echo "<script>
        alert('Email já cadastrado!'); location= './cadastro-cliente.html';
        </script>";
    }else{
    //faz o cadastro do novo usuario no banco de dados!
        $inserir = mysqli_query($conexao,"INSERT INTO cliente(nome,email,cpf,data_nascimento,foto,usuario,senha) 
        values ('$nome','$email','$cpf','$dataNascimento','$foto','$usuario','$senha')");
        echo "<script>
        alert('Cadastrado com sucesso!'); location= './buscar-restaurantes.html';
        </script>";
        }
    mysqli_close($conexao);
}



?>