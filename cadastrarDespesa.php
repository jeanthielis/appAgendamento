<?php

<?php
include_once('conexao.php');

// Coletar dados do formulário
$descricao = "teste";
$valor = 150;
$tipo = "Pessoal";



// Inserir dados no banco de dados
$sql = "INSERT INTO despesas (NOW(), descricao, valor,tipo)
        VALUES ('$dataDespesa', '$descricao','$valor','$tipo')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
