<?php

include_once('config.php');

$dadosReserva = mysqli_query($conexao,"SELECT * FROM reserva");
        if(mysqli_num_rows($dadosReserva) >= 1){
            $GLOBALS['reservas'] = array();
            while($linha = $dadosReserva->fetch_array(MYSQLI_ASSOC))
            {
            $lis[] = $linha;
            }
            $GLOBALS['reservas'] = $lis;
        }else{
            $GLOBALS['reservas'] = null;
        }

//CADASTRO DE NOVOS USUÁRIOS
if(isset($_POST['reservar'])){
    session_start();
    $nome = $_POST['nomeClienteReserva'];
    $idCliente = $_SESSION['id'];
    $email = $_POST['emailClienteReserva'];
    $data= $_POST['dataClienteReserva'];
    $tel = $_POST['telClienteReserva'];
    $horario = $_POST['horarioClienteReserva'];
    $mesa = $_POST['mesaClienteReserva'];
    $estabelecimento_id = $_POST['restauranteId'];

    //faz o cadastro do novo usuario no banco de dados!
    if(mysqli_query($conexao,"INSERT INTO reserva(cliente_id,data,horario,mesa_id,estabelecimento_id) 
    values ('$idCliente','$data','$horario','$mesa','$estabelecimento_id')"))
    {
        $dados = mysqli_query($conexao,"SELECT * FROM reserva WHERE cliente_id = '$idCliente'");
        if(mysqli_num_rows($dados) >= 1){
            while($linha = $dados->fetch_array(MYSQLI_ASSOC))
            {
            $linhas[] = $linha;
            }
        $_SESSION['reservas'] = $linhas;
        }
        echo "<script>
                alert('Reserva feita com Sucesso!'); location= './view/minhas-reservas.php';
                </script>";
        } else {
            echo "ERRO: " . mysqli_error($conexao);
        }  
    mysqli_close($conexao);
}

//EXCLUIR USUÁRIO
if(isset($_GET['delete'])){
    session_start();
    $id = $_GET['id'];
    $count = $_GET['count'];
    if(mysqli_query($conexao,"DELETE FROM reserva WHERE id = '$id'")){
        unset($_SESSION['reservas'][$count]);
        echo "<script>
        alert('Reserva Cancelada com Sucesso!'); location= './view/minhas-reservas.php?cancelado=true&count=$count';
        </script>";
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
    $cel = $_POST['celCliente'];
    $cpf = $_POST['cpfCliente'];
    $senha = $_POST['senhaCliente'];

    $dados = mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email' AND cpf = '$cpf'");
    if(mysqli_num_rows($dados) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        if (password_verify($senha, $linha['senha'])) {
            if(mysqli_query($conexao,"UPDATE cliente SET nome = '$nome', data_nascimento = '$dataNascimento', usuario = '$usuario', tel = '$cel' WHERE email = '$email' AND cpf = '$cpf'")){
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['nome'] = $nome;
                $_SESSION['data_nascimento'] = $dataNascimento;
                $_SESSION['cel'] = $cel;
                echo "<script>
                alert('Conta Atualizada com Sucesso!'); location= './view/perfil-cliente.php';
                </script>";
            }
        }else{
            echo "<script>
            alert('Senha incorreta!'); window. history. back();
            </script>";
        }
    }
    mysqli_close($conexao);
}

?>