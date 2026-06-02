<?php


// isso é o código para destruir a sessão do usuário e redirecionar para a página de login  
    session_start();

    // destruir a sessão do usuário
    session_destroy();
     
    // redirecionar para a página de login
    header("Location: ../index.php");

    // sair
    exit();

?>