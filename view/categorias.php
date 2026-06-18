<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}
// Puxa a conexão para podermos listar as categorias cadastradas
require_once '../model/conexao.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Categorias - Controle de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Controle de Estoque</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="dashboard.php">Início</a>
                <a class="nav-link active" href="categorias.php">Categorias</a>
                <a class="nav-link" href="produtos.php">Produtos</a>
                <a class="nav-link" href="movimentacoes.php">Movimentações</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Gerenciar Categorias</h2>
        <hr>
        
        <form action="../controller/categoria_controller.php" method="POST" class="mb-4 d-flex">
            <input type="text" name="nome_categoria" class="form-control me-2" placeholder="Ex: Eletrônicos, Limpeza..." required>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome da Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Busca as categorias no banco de dados
                $sql = "SELECT * FROM categorias";
                $resultado = $conn->query($sql);

                // Mostra cada linha que vier do banco
                while ($linha = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $linha['id'] . "</td>";
                    echo "<td>" . $linha['nome_categoria'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>