<?php
// controller/categoria_controller.php

require_once '../model/conexao.php';

// Verifica se o formulário mandou algum texto
if (isset($_POST['nome_categoria'])) {
    
    $nome = $_POST['nome_categoria'];
    
    // Comando SQL para inserir na tabela categorias
    $sql = "INSERT INTO categorias (nome_categoria) VALUES ('$nome')";
    
    // Executa o comando
    $conn->query($sql);
}

// Redireciona de volta para a tela de categorias para ver a tabela atualizada
header("Location: ../view/categorias.php");
exit();
?>