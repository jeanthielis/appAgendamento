<?php

include_once('conexao.php');

// Coletar dados do formulário
 // Data atual
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$tipo = $_POST['tipo'];



// Inserir dados no banco de dados
$sql = "INSERT INTO despesas (data_despesa, descricao, valor,tipo)
        VALUES (now(), '$descricao','$valor','$tipo')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
