<?php
// controller/produto_controller.php
require_once '../model/conexao.php';

// Verifica se os campos foram preenchidos
if (isset($_POST['nome_produto']) && isset($_POST['id_categoria'])) {
    
    $nome = $_POST['nome_produto'];
    $id_categoria = $_POST['id_categoria'];
    
    // Insere o produto no banco (a quantidade inicial entra como 0 automaticamente pelo banco)
    $sql = "INSERT INTO produtos (nome_produto, id_categoria) VALUES ('$nome', $id_categoria)";
    
    $conn->query($sql);
}

// Devolve para a tela de produtos
header("Location: ../view/produtos.php");
exit();
?>