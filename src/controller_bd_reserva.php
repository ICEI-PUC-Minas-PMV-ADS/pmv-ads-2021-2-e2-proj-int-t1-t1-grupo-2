<?php

include_once('config.php');

include_once('controller_bd_restaurante.php');
$lista = $GLOBALS['linhas'];

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
        echo "<script>
                alert('Reserva feita com Sucesso!'); location= './view/perfil-restaurante.php?id=$estabelecimento_id';
                </script>";
        } else {
            echo "ERRO: " . mysqli_error($conexao);
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
                if($linha['foto'] != "bbBBbbCCccAAccBBBaaaaCCCCddddSSs321123555.jpg"){
                    @unlink("pictures/".$linha['foto']);
                }
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