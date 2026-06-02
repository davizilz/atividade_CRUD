<!-- Tabela de Usuários Cadastrados -->
<h3>Usuários Cadastrados</h3>

<!-- Tabela de Usuários -->
<table border="1" cellpadding="3">

    <tr>
<!-- ID -->
        <th>ID</th>
<!-- Nome -->
        <th>Nome</th>
<!-- Senha -->
        <th>Senha</th>
    </tr>

    <?php

    // Consultar usuários cadastrados no banco de dados e exibi-los na tabela.
    $sqlUsuarios = "SELECT * FROM users";

    // executar a consulta e armazenar o resultado em uma variável para exibir os usuários cadastrados na tabela.
    $resultadoUsuarios = $conn->query($sqlUsuarios);
    
    // percorrer o resultado da consulta e exibir os usuários cadastrados na tabela.
    while($linha = $resultadoUsuarios->fetch_assoc()){

        // exibir os dados do usuário na tabela.
        echo "
        <tr>
// exibir o ID do usuário, o nome do usuário e a senha do usuário na tabela.
            <td>" . $linha["id"]."</td>

// exibir o nome do usuário na tabela.
            <td>" . $linha["username"]."</td>

// exibir a senha do usuário na tabela.
            <td>" . $linha["password"]."</td>
        </tr>
        ";

    }

    ?>

</table>