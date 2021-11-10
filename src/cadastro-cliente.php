<?php

if(isset($_POST['submit'])){
    
    include_once('config.php');

    $nome = $_POST['nomeCliente'];
    $email = $_POST['emailCliente'];
    $cpfCliente = $_POST['cpfCliente'];
    $dataNasCliente = $_POST['dataNasCliente'];
    $telCliente = $_POST['telCliente'];
    $celCliente = $_POST['celCliente'];
    $usuarioCliente = $_POST['usuarioCliente'];
    $senhaCliente = $_POST['senhaCliente'];

    $result = mysqli_query($conexao,"INSERT INTO cliente()");

}



?>