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
    <title>Movimentações - Controle de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Controle de Estoque</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="dashboard.php">Início</a>
                <a class="nav-link" href="categorias.php">Categorias</a>
                <a class="nav-link" href="produtos.php">Produtos</a>
                <a class="nav-link active" href="movimentacoes.php">Movimentações</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Registrar Entrada / Saída</h2>
        <hr>
        
        <form action="../controller/movimentacao_controller.php" method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Produto</label>
                    <select name="id_produto" class="form-control" required>
                        <option value="">Selecione o produto...</option>
                        <?php
                        $sqlProd = "SELECT * FROM produtos";
                        $resProd = $conn->query($sqlProd);
                        while ($prod = $resProd->fetch_assoc()) {
                            echo "<option value='" . $prod['id'] . "'>" . $prod['nome_produto'] . " (Estoque: " . $prod['quantidade_estoque'] . ")</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tipo de Movimento</label>
                    <select name="tipo_movimento" class="form-control" required>
                        <option value="Entrada">Entrada (+)</option>
                        <option value="Saida">Saída (-)</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" min="1" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Data e Hora</th>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT m.data_movimentacao, p.nome_produto, m.tipo_movimento, m.quantidade 
                        FROM movimentacoes m 
                        INNER JOIN produtos p ON m.id_produto = p.id 
                        ORDER BY m.id DESC";
                $resultado = $conn->query($sql);

                while ($linha = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    // Formata a data para o padrão brasileiro
                    echo "<td>" . date('d/m/Y H:i', strtotime($linha['data_movimentacao'])) . "</td>";
                    echo "<td>" . $linha['nome_produto'] . "</td>";
                    
                    // Coloca cor verde para Entrada e vermelho para Saída
                    if ($linha['tipo_movimento'] == 'Entrada') {
                        echo "<td class='text-success fw-bold'>ENTRADA</td>";
                    } else {
                        echo "<td class='text-danger fw-bold'>SAÍDA</td>";
                    }
                    
                    echo "<td>" . $linha['quantidade'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>