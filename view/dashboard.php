<?php
// view/dashboard.php

// 1. Inicia a sessão para verificar se o usuário passou pelo login
session_start();

// REGRA DE SEGURANÇA: Se não existir a sessão de logado, manda de volta para o login
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel - Controle de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Controle de Estoque</a>
            
            <div class="collapse navbar-collapse">
                <div class="navbar-nav me-auto">
                    <a class="nav-link active" href="dashboard.php">Início</a>
                    <a class="nav-link" href="categorias.php">Categorias</a>
                    <a class="nav-link" href="a">Produtos</a>
                    <a class="nav-link" href="a">Movimentações</a>
                </div>
                <span class="navbar-text text-white me-3">
                    Olá, <?php echo $_SESSION['nome_usuario']; ?>!
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="bg-light p-5 rounded shadow">
            <h1>Sistema de Gestão de Estoque</h1>
            <p class="lead">Painel administrativo para controle de mercadorias e movimentações.</p>
            <hr class="my-4">
            <p>Use o menu superior para navegar entre as tabelas do sistema.</p>
        </div>
    </div>

</body>
</html>