<?php

include_once('config.php');

    $dadosEstabelecimento = mysqli_query($conexao,"SELECT * FROM estabelecimento");
        if(mysqli_num_rows($dadosEstabelecimento) >= 1){
            $GLOBALS['linhas'] = array();
            while($linha = $dadosEstabelecimento->fetch_array(MYSQLI_ASSOC))
            {
            $lis[] = $linha;
            }
            $GLOBALS['linhas'] = $lis;
        }else{
            $GLOBALS['linhas'] = null;
        }

if(isset($_POST['cadastrar'])){
    session_start();

    $empresario_id = $_SESSION['id'];
    $nome = $_POST['nomeRestaurante'];
    $logo = $_FILES['logoRestaurante'];
    $cnpj = $_POST['cnpjRestaurante'];
    $tel = $_POST['telRestaurante'];
    $redeSocial = $_POST['redeSocialRestaurante'];
    $site = $_POST['siteRestaurante'];
    $email = $_POST['emailRestaurante'];
    $logradouro = $_POST['logradouroRestaurante'];
    $bairro = $_POST['bairroRestaurante'];
    $cidade = $_POST['cidadeRestaurante'];
    $cep = $_POST['cepRestaurante'];
    $estado = $_POST['estadoRestaurante'];
    $horarioAbrir = $_POST['horarioAbrirRestaurante'];
    $horarioFechar = $_POST['horarioFecharRestaurante'];
    $diasDaSemana = $_POST['diasDaSemanaRestaurante'];
    $diasDaSemanaTexto = '';
    $formasDePagamento = $_POST['formasDePagamento'];
    $formasDePagamentoTexto = '';
    $qtdMesa = $_POST['qtdMesa'];


    //faz a consulta no BD e contabiliza quantos dados foram encontrados
    $verificarSeExisteCnpj = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM estabelecimento WHERE cnpj = '$cnpj'"));
    $verificarSeExisteEmail = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM estabelecimento WHERE email = '$email'"));
    if($verificarSeExisteEmail == 1){
        echo "<script>
        alert('Email já cadastrado!'); window. history. back();
        </script>";
    }else if($verificarSeExisteCnpj == 1){
        echo "<script>
        alert('CNPJ já cadastrado!'); window. history. back();
        </script>";
    }else
    {

    //Transforma os checkboxs selecionados em texto.
    foreach($diasDaSemana as $chk1)  
    {  
      $diasDaSemanaTexto .= $chk1.",";  
    }
    foreach($formasDePagamento as $chk2)  
    {  
      $formasDePagamentoTexto .= $chk2.",";  
    }

    if ($_FILES['logoRestaurante']['size'] != 0){

        $extensao = strtolower(substr($_FILES['logoRestaurante']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "pictures/";
    
        move_uploaded_file($_FILES['logoRestaurante']['tmp_name'], $diretorio.$novo_nome);
    }else{
        $novo_nome = "aaaavvvvvv.jpg";
    }

   //faz o cadastro do novo estabelecimetno no banco de dados!
    if(mysqli_query($conexao,"INSERT INTO estabelecimento(nome,logo,cnpj,tel,redeSocial,site,email,logradouro,bairro,cidade,
    cep,estado,horarioAbrir,horarioFechar,diasDaSemana,formasDePagamento,empresario_id,qtdMesa) 
    values ('$nome','$novo_nome','$cnpj','$tel','$redeSocial','$site','$email','$logradouro','$bairro','$cidade','$cep','$estado','$horarioAbrir',
    '$horarioFechar','$diasDaSemanaTexto','$formasDePagamentoTexto','$empresario_id','$qtdMesa')"))
    {
        $dados = mysqli_query($conexao,"SELECT * FROM estabelecimento WHERE empresario_id = '$empresario_id'");
        if(mysqli_num_rows($dados) >= 1){
            while($linha = $dados->fetch_array())
            {
            $linhas[] = $linha;
            }
        $_SESSION['estabelecimentos'] = $linhas;
        }
        echo "<script>
        alert('Restaurante Cadastrado com sucesso!'); location= './view/buscar-restaurantes.php';
        </script>";
    }else{
            echo "ERRO: " . mysqli_error($conexao);
    }  
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
    $cpf = $_POST['cpfCliente'];
    $senha = $_POST['senhaCliente'];

    $dados = mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email' AND cpf = '$cpf'");
    if(mysqli_num_rows($dados) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        if (password_verify($senha, $linha['senha'])) {
            if(mysqli_query($conexao,"UPDATE cliente SET nome = '$nome', data_nascimento = '$dataNascimento', usuario = '$usuario' WHERE email = '$email' AND cpf = '$cpf'")){
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['nome'] = $nome;
                $_SESSION['data_nascimento'] = $dataNascimento;
                echo "<script>
                alert('Conta Atualizada com Sucesso!'); location= './view/perfil-cliente.php';
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


?>