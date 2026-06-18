<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}
require_once '../model/conexao.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos - Controle de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Controle de Estoque</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="dashboard.php">Início</a>
                <a class="nav-link" href="categorias.php">Categorias</a>
                <a class="nav-link active" href="produtos.php">Produtos</a>
                <a class="nav-link" href="movimentacoes.php">Movimentações</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Gerenciar Produtos</h2>
        <hr>
        
        <form action="../controller/produto_controller.php" method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Nome do Produto</label>
                    <input type="text" name="nome_produto" class="form-control" placeholder="Ex: Teclado Mecânico" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Categoria</label>
                    <select name="id_categoria" class="form-control" required>
                        <option value="">Selecione...</option>
                        <?php
                        $sqlCat = "SELECT * FROM categorias";
                        $resCat = $conn->query($sqlCat);
                        while ($cat = $resCat->fetch_assoc()) {
                            echo "<option value='" . $cat['id'] . "'>" . $cat['nome_categoria'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">Salvar</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Quantidade em Estoque</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // O INNER JOIN é o comando que troca o ID da Categoria pelo Nome dela na tela para ficar mais fácil de ler
                $sql = "SELECT p.id, p.nome_produto, p.quantidade_estoque, c.nome_categoria 
                        FROM produtos p 
                        INNER JOIN categorias c ON p.id_categoria = c.id";
                $resultado = $conn->query($sql);

                while ($linha = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $linha['id'] . "</td>";
                    echo "<td>" . $linha['nome_produto'] . "</td>";
                    echo "<td>" . $linha['nome_categoria'] . "</td>";
                    // Destaca a quantidade se for zero
                    if ($linha['quantidade_estoque'] == 0) {
                        echo "<td class='text-danger fw-bold'>0 (Sem Estoque)</td>";
                    } else {
                        echo "<td>" . $linha['quantidade_estoque'] . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>