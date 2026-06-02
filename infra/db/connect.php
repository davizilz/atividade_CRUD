<?php

// Configurações de conexão com o banco de dados
    $host = "localhost";
// Configurações de conexão com o banco de dados
    $user = "root";
// Configurações de conexão com o banco de dados
    $pass = "root";
// Configurações de conexão com o banco de dados
    $db = "sistema_simples";
// Criar uma nova conexão com o banco de dados usando as configurações definidas acima e armazenar a conexão em uma variável para ser usada em outras partes do código para executar consultas no banco de dados.
    $conn = new mysqli($host,$user,$pass,$db);
    
// Verificar se a conexão com o banco de dados foi bem-sucedida ou se houve um erro na conexão, e exibir uma mensagem no console do navegador para indicar o status da conexão.
    if ($conn->connect_error){
        echo "<script> console.log('erro na conexão com o banco') </script>";
    }else{
        echo "<script> console.log('conexão com o banco foi um sucesso')</script>";
    }

?>