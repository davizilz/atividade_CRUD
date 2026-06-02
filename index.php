<?php

// iniciar sessão no servidor
session_start();

//incluir conexão com o banco
include("infra/db/connect.php");
//verificar se o método de requisição é POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
//capturar os dados do formulário
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    //exibir os dados capturados no console do navegador
    echo "<script> console.log('usuario captado com sucesso $usuario') </script>";
    echo "<script> console.log('senha captado com sucesso $senha') </script>";

    //consultar o banco de dados para ver se o usuário existe
    $sql = "SELECT * FROM users WHERE username ='$usuario' AND password ='$senha'";

    //executar a consulta no console do navegador para verificar se a consulta está correta
    $resultado = $conn -> query($sql);

    //verificar se a consulta retornou algum resultado se sim, redirecionar para a página de home, se não, exibir uma mensagem de erro
    if($resultado->num_rows > 0){
        $_SESSION["usuario"] = $usuario;
        header("Location: public/home.php");
        exit();
    }else{
        $erro = "Usuário ou senha inválidos.";
    }


}
?>

<html lang="en">
<head>
    <!-- isso é o meta tag para definir a codificação de caracteres da página -->
    <meta charset="UTF-8">

    <!-- meta tag para garantir que a página seja correta a proporção em outros dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- título da página -->
    <title>Tela de Login</title>

    <!-- isso é um link para o arquivo de estilo CSS para estilizar a página do site -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php

    // isso é a navbar do site, feita para facilitar a navegação entre as páginas do site
    include("public/components/navbar.php")


    ?>

    <!-- isso é o título da página, que é exibido no topo da página -->
    <h1>Tela de Login - PHP</h1>


    <!-- isso é o formulário de login, onde o usuário pode inserir seu nome de usuário e senha para acessar a página de home do site. -->
    <form method="POST">

    <!-- serve para o usuário inserir suas credenciais nesse caso usuario e senha -->
        <label>Usuario</label>
        <input type="text" name="usuario"> <br>
        <label>Senha</label>

        <!-- o tipo password é usado para ocultar a senha do usuário enquanto ele a digita -->
        <input type="password" name="senha"> <br>
        <?php
        

        <!-- isso é para exibir a mensagem de erro caso o usuário ou senha sejam inválidos -->
        if(isset($erro)){
            echo $erro;
        }
        
        ?>
        <br>

<!-- isso é o botão de submit para enviar os dados do formulário para o servidor -->
        <button type="submit">Entrar</button>

    </form>
</body>
</html>