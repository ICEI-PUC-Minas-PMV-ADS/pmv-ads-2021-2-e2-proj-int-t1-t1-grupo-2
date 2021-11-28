<?php

include_once('config.php');

//CADASTRO DE NOVOS USUÁRIOS
if(isset($_POST['cadastrar'])){
    
    $options = [
        'cost' => 12,
    ];

    $nome = $_POST['nomeEmpresario'];
    $email = $_POST['emailEmpresario'];
    $foto = $_FILES['fotoEmpresario'];
    $cnpj = $_POST['cnpjEmpresario'];
    $dataNascimento = $_POST['dataNasEmpresario'];
    $tel = $_POST['telEmpresario'];
    $cel = $_POST['celEmpresario'];
    $usuario = $_POST['usuarioEmpresario'];
    //codifica a senha para maior segurança
    $senha = password_hash($_POST['senhaEmpresario'], PASSWORD_BCRYPT, $options);

    //faz a consulta no BD e contabiliza quantos dados foram encontrados
    $verificarSeExisteEmail = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM empresario WHERE email = '$email'"));
    $verificarSeExisteCnpj = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM empresario WHERE cnpj = '$cnpj'"));
    $verificarSeExisteEmailCliente = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM cliente WHERE email = '$email'"));
    $verificarSeExisteCpfCliente = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM cliente WHERE cpf = '$cpf'"));
    if($verificarSeExisteEmail == 1 OR $verificarSeExisteEmailCliente == 1){
        echo "<script>
        var resultado = confirm('Email já cadastrado, deseja entrar?');
        if(resultado == true){
            location= './view/login.html';
        }else{
            window. history. back();
        }
        </script>";
    }else if($verificarSeExisteCnpj == 1){
        echo "<script>
        var resultado = confirm('CNPJ já cadastrado, deseja entrar?');
        if(resultado == true){
            location= './view/login.html';
        }else{
            window. history. back();
        }
        </script>";
    }else if($verificarSeExisteCpfCliente == 1){
        echo "<script>
        var resultado = confirm('CPF já cadastrado, deseja entrar?');
        if(resultado == true){
            location= './view/login.html';
        }else{
            window. history. back();
        }
        </script>";
    }else
    {
        if ($_FILES['fotoEmpresario']['size'] != 0){

            $extensao = strtolower(substr($_FILES['fotoEmpresario']['name'], -4));
            $novo_nome = md5(time()) . $extensao;
            $diretorio = "pictures/";
    
            move_uploaded_file($_FILES['fotoEmpresario']['tmp_name'], $diretorio.$novo_nome);
        }else{
            $novo_nome = "bbBBbbCCccAAccBBBaaaaCCCCddddSSs321123555.jpg";
        }

    //faz o cadastro do novo usuario no banco de dados!
    if(mysqli_query($conexao,"INSERT INTO empresario(nome,email,cnpj,data_nascimento,foto,usuario,senha) 
    values ('$nome','$email','$cnpj','$dataNascimento','$novo_nome','$usuario','$senha')"))
    {
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['perfil'] = 'empresario';
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['cnpj'] = $cnpj;
        $_SESSION['data_nascimento'] = $dataNascimento;
        $_SESSION['celular'] = $cel;
        $_SESSION['telefone'] = $tel;
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

    $email = $_POST['emailEmpresario'];
    $cpf = $_POST['cnpjEmpresario'];
    $senha = $_POST['senhaEmpresario'];

    $dados = mysqli_query($conexao,"SELECT * FROM empresario WHERE email = '$email' AND cnpj = '$cnpj'");
    if(mysqli_num_rows($dados) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        if (password_verify($senha, $linha['senha'])) {
            $senha_verificada = $linha['senha'];
            if(mysqli_query($conexao,"DELETE FROM empresario WHERE email = '$email' AND cnpj = '$cnpj' AND senha = '$senha_verificada'")){
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
            alert('Senha incorreta!'); location= './view/perfil-empresario.php';
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

    $nome = $_POST['nomeEmpresario'];
    $usuario = $_POST['usuarioEmpresario'];
    $dataNascimento = $_POST['dataNasEmpresario'];
    $email = $_POST['emailEmpresario'];
    $cpf = $_POST['cnpjEmpresario'];
    $senha = $_POST['senhaEmpresario'];

    $dados = mysqli_query($conexao,"SELECT * FROM empresario WHERE email = '$email' AND cnpj = '$cnpj'");
    if(mysqli_num_rows($dados) == 1){
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        if (password_verify($senha, $linha['senha'])) {
            if(mysqli_query($conexao,"UPDATE empresario SET nome = '$nome', data_nascimento = '$dataNascimento', usuario = '$usuario' WHERE email = '$email' AND cnpj = '$cnpj'")){
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
            alert('Senha incorreta!'); window. history. back();
            </script>";
        }
    }
    mysqli_close($conexao);
}

?>