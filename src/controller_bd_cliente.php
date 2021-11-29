<?php

include_once('config.php');

//CADASTRO DE NOVOS USUÁRIOS
if(isset($_POST['cadastrar'])){
    
    $options = [
        'cost' => 12,
    ];

    $nome = $_POST['nomeCliente'];
    $email = $_POST['emailCliente'];
    $foto = $_FILES['fotoCliente'];
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
    $verificarSeExisteEmailEmpresario = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM empresario WHERE email = '$email'"));
    $verificarSeExisteCnpjEmpresario = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM empresario WHERE cnpj = '$cnpj'"));
    if($verificarSeExisteEmail == 1 OR $verificarSeExisteEmailEmpresario == 1){
        echo "<script>
        var resultado = confirm('Email já cadastrado, deseja entrar?');
        if(resultado == true){
            location= './view/login.html';
        }else{
            window. history. back();
        }
        </script>";
    }else if($verificarSeExisteCpf == 1){
        echo "<script>
        var resultado = confirm('CPF já cadastrado, deseja entrar?');
        if(resultado == true){
            location= './view/login.html';
        }else{
            window. history. back();
        }
        </script>";
    }else if($verificarSeExisteCnpjEmpresario == 1){
        echo "<script>
        var resultado = confirm('CNPJ já cadastrado, deseja entrar?');
        if(resultado == true){
            location= './view/login.html';
        }else{
            window. history. back();
        }
        </script>";
    }else
    {
        if ($_FILES['fotoCliente']['size'] != 0){

            $extensao = strtolower(substr($_FILES['fotoCliente']['name'], -4));
            $novo_nome = md5(time()) . $extensao;
            $diretorio = "pictures/";
    
            move_uploaded_file($_FILES['fotoCliente']['tmp_name'], $diretorio.$novo_nome);
        }else{
            $novo_nome = "bbBBbbCCccAAccBBBaaaaCCCCddddSSs321123555.jpg";
        }
        
    //faz o cadastro do novo usuario no banco de dados!
    if(mysqli_query($conexao,"INSERT INTO cliente(nome,email,cpf,data_nascimento,foto,usuario,senha) 
    values ('$nome','$email','$cpf','$dataNascimento','$novo_nome','$usuario','$senha')"))
    {
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['id'] = mysqli_insert_id($conexao);
        $_SESSION['perfil'] = 'cliente';
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['data_nascimento'] = $dataNascimento;
        $_SESSION['cel'] = $cel;
        $_SESSION['tel'] = $tel;
        $_SESSION['foto'] = "pictures/".$novo_nome;

        echo "<script>
        alert('Cadastrado com sucesso!'); location= './view/buscar-restaurantes.php';
        </script>";
        } else{
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