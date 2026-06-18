<?php
// controller/movimentacao_controller.php
require_once '../model/conexao.php';

if (isset($_POST['id_produto']) && isset($_POST['tipo_movimento']) && isset($_POST['quantidade'])) {
    
    $id_produto = $_POST['id_produto'];
    $tipo = $_POST['tipo_movimento'];
    $quantidade = $_POST['quantidade'];
    
    // 1. Salva o histórico da movimentação
    $sql_historico = "INSERT INTO movimentacoes (id_produto, tipo_movimento, quantidade) 
                      VALUES ($id_produto, '$tipo', $quantidade)";
    $conn->query($sql_historico);
    
    // 2. A "Movimentação de Dados" exigida no trabalho: Atualiza o estoque do produto
    if ($tipo == 'Entrada') {
        // Se for entrada, SOMA na quantidade atual
        $sql_atualiza = "UPDATE produtos SET quantidade_estoque = quantidade_estoque + $quantidade WHERE id = $id_produto";
    } else {
        // Se for saída, SUBTRAI da quantidade atual
        $sql_atualiza = "UPDATE produtos SET quantidade_estoque = quantidade_estoque - $quantidade WHERE id = $id_produto";
    }
    
    // Executa a matemática no banco de dados
    $conn->query($sql_atualiza);
}

// Devolve para a tela de movimentações
header("Location: ../view/movimentacoes.php");
exit();
?>