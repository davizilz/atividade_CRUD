<?php

// sessão de controle de acesso para a página home.
    session_start();

    // verificar se o usuário está logado.
    if(!isset($_SESSION["usuario"])){

// se o usuário não estiver logado, redirecionar para a página de login.
        header("Location: ../index.php");

// sair.
        exit();
    }

// incluir a conexão com o banco de dados para poder cadastrar novos usuários.
    include("../infra/db/connect.php");

// verificar se o método de requisição é POST para cadastrar novos usuários.
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // obter os dados do formulário
        $novoUsuario = $_POST["usuario"];
        $novaSenha = $_POST["senha"];

        // inserir os dados do novo usuário no banco de dados
        $sql = "INSERT INTO users(username, password) VALUES ('$novoUsuario','$novaSenha')";

        // executar a consulta e verificar se o usuário foi cadastrado com sucesso ou se houve um erro.
        if($conn->query($sql) === TRUE){

            // usuário cadastrado com sucesso
            echo "<script> alert('Usuário Cadastrado com Sucesso!');</script>";

        }else{
            // erro ao cadastrar o usuário
            echo "<script> alert('Erro: Usuário Não Cadastrado!');</script>";  
        }

    }

?>
<html lang="en">
<head>

<!-- Título da Página -->
    <title>Home</title>

<!-- Link CSS para Estilos da Página -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

    <?php

// incluir a barra de navegação para facilitar a navegação entre as páginas do site.
    include("components/navbar.php")
    ?>

<!-- Mensagem de Boas-Vindas  -->
    <h1>Bem vindo, <?php echo $_SESSION["usuario"]; ?> </h1>

<!-- Link para a página de logout -->
    <a href="logout.php">Sair</a>

    <hr>

    <!-- Formulário para Cadastro de Novos Usuários -->
    <h3>Cadastrar Novos Usuários</h3>

<!-- Formulário para Cadastro de Novos Usuários -->
    <form method="POST">
        <!-- Campo para o Nome de Usuário -->
        <label>Usuario</label>
        <input type="text" name="usuario"> <br>
        <!-- Campo para a Senha -->
        <label>Senha</label>
        <input type="password" name="senha"> <br>
        <br>

        <!-- Botão para Cadastrar Novo Usuário -->
        <button type="submit">cadastrar</button>
    </form>

    <hr>

    <?php

    // incluir a tabela de usuários cadastrados para exibir os usuários cadastrados no banco de dados.
    include("components/table.php")
    ?>


</body>
</html>