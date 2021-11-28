<?php

$servername = "localhost";
$username = "dinnerboss";
$password = "D1nn3rB0$$";
$db = "dinnerboss";

$link = mysqli_connect($servername, $username, $password, $db);
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$nome_do_cliente = mysqli_real_escape_string($link, $_REQUEST['Cliente']);
$Telefone = mysqli_real_escape_string($link, $_REQUEST['Telefone']);
$email = mysqli_real_escape_string($link, $_REQUEST['Email']);
$restaurante = mysqli_real_escape_string($link, $_REQUEST['Restaurante']);
$mesa = mysqli_real_escape_string($link, $_REQUEST['Mesa']);
$data_agendamento = mysqli_real_escape_string($link, $_REQUEST['Data']);
$horario_agendamento = mysqli_real_escape_string($link, $_REQUEST['Horario']); 

$sql = "INSERT INTO Reserva (Cliente, Telefone, Email, Restaurante, Mesa, Data) VALUES ('$nome_do_cliente', '$Telefone', '$email', '$restaurante', '$mesa', '$data_agendamento', '$horario_agendamento')";

if(mysqli_query($link, $sql)){
    echo "Reserva cadastrada com sucesso.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
mysqli_close($link);
?>