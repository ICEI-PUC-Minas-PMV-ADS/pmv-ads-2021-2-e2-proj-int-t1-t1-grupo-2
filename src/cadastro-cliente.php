<?php

if(isset($_POST['submit'])){
    
    include_once('config.php');

    $nome = $_POST['nomeCliente'];
    $email = $_POST['emailCliente'];
    $cpf = $_POST['cpfCliente'];
    $dataNascimento = $_POST['dataNasCliente'];
    $tel = $_POST['telCliente'];
    $cel = $_POST['celCliente'];
    $usuario = $_POST['usuarioCliente'];
    $senha = $_POST['senhaCliente'];

    $result = mysqli_query($conexao,"INSERT INTO cliente(nome,email,cpf,data_nascimento,foto,senha) 
    values ('$nome','$email','$cpf','$dataNascimento','$usuario','$senha')");

}



?>