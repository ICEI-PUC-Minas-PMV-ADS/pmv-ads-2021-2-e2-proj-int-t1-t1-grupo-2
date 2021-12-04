<?php

    $dbHost = 'Localhost';
    $dbUsername= 'root';
    $dbPassword = '';
    $dbName = 'dinnerboss';

    $GLOBALS['conexao'] = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    if($conexao->connect_errno){
        echo "Erro ao acessar o BD!";
    }
?>