<?php
// controller/login_controller.php

// Inicia a sessão para o sistema lembrar que o usuário logou
session_start();

// Puxa o arquivo de conexão que você fez
require_once '../model/conexao.php';

// Verifica se os campos de login e senha foram preenchidos na tela
if (isset($_POST['login']) && isset($_POST['senha'])) {
    
    $usuarioDigitado = $_POST['login'];
    $senhaDigitada = $_POST['senha'];

    // Procura no banco de dados
    $sql = "SELECT * FROM usuarios WHERE login = '$usuarioDigitado' AND senha = '$senhaDigitada'";
    $resultado = $conn->query($sql);

    // Se achou alguém, entra no sistema
    if ($resultado->num_rows > 0) {
        
        $dados = $resultado->fetch_assoc();
        $_SESSION['logado'] = true;
        $_SESSION['nome_usuario'] = $dados['nome'];

        // Manda para a tela principal (que vamos criar depois)
        header("Location: ../view/dashboard.php");
        exit();
        
    } else {
        // Se errou a senha, devolve para o login com aviso de erro
        header("Location: ../view/login.php?erro=1");
        exit();
    }
}
?>