<?php
include_once('conexao.php');

$sql = "SELECT date_format(dataDespesa,'%d/%m/%y') as data, valor, descricao, data_despesa FROM despesa ORDER BY data_despesa DESC";
$resultado = mysqli_query($conn, $sql);

while ($linha = mysqli_fetch_assoc($resultado)) {
    $data = $linha['data'];
    $valor = number_format($linha['valor'], 2, ',', '.');
    $descricao = $linha['descricao'];
    $data_despesa = date('d/m/Y', strtotime($linha['data_despesa']));

    echo "<div class='card mb-3'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Data: $data</h5>";
    echo "<p class='card-text'>Descrição: $descricao</p>";
    echo "<p class='card-text'>Valor: R$ $valor</p>";
    echo "<p class='card-text'><small class='text-muted'>Registrado em: $data_despesa</small></p>";
    echo "</div>";
    echo "</div>";
}?>