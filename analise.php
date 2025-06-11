<?php
$margem = 0.6; // 30% de lucro
$sql2="SELECT sum(valor) as soma,count(id_agenda) as festa,sum(entrada) as entrada,sum(valor)*$margem as lucro,sum(valor)/count(distinct month(data)) as media,(sum(valor)/count(distinct month(data)))*$margem as lucroMensal FROM agenda where situacao=1"; ;
include_once('conexao.php');
$resultadoSoma = mysqli_query($conn,$sql2);
while($result = mysqli_fetch_assoc($resultadoSoma)){
    $soma = "R$ ".number_format($result['soma'],2,',','.');
    $festa = $result['festa'];
    $entrada = "R$ ".number_format($result['entrada'],2,',','.');
    $lucro = "R$ ".number_format($result['lucro'],2,',','.');
    $media = "R$ ".number_format($result['media'],2,',','.');
    $lucroMensal = "R$ ".number_format($result['lucroMensal'],2,',','.');
}
?>
<html>
   
    <br>
    <hr>
    <div class="row">
        <div class="col text-center p-0 m-2">
            <div class="alert bg-primary">
                
                <strong class='text-white'><?php echo $soma?></strong><br>
                <strong class='text-white' for="">Faturamento Anual</strong>
            </div>
            
        </div>
        <div class="col text-center p-0 m-2 ">
            <div class="alert bg-success ">
                <strong class='text-white'><?php echo $festa?></strong><br>
                <strong class='text-white' for="">Festa Concluidas</strong>
            </div>
            
        </div>
    </div>


    <div class="row">
        <div class="col text-center p-0 m-2">
            <div class="alert bg-warning">
                <strong class='text-white'><?php echo $entrada?></strong><br>
                <strong class='text-white' for="">Entrada</strong>
            </div>
            
        </div>
        <div class="col text-center p-0 m-2">
            <div class="alert bg-danger">
                <strong class='text-white'><?php echo $lucro?></strong><br>
                <strong class='text-white' for="">Lucro Anual</strong>
            </div>    
        </div>
    </div>


    <div class="row">
        <div class="col text-center p-0 m-2">
            <div class="alert bg-info">
                <strong class='text-white'><?php echo $media?></strong><br>
                <strong class='text-white' for="">Média Mensal</strong>
            </div>
            
        </div>
        <div class="col text-center p-0 m-2">
        <div class="alert bg-dark">
                <strong class='text-white'><?php echo $lucroMensal?></strong><br>
                <strong class='text-white' for="">Lucro Mensal</strong>
            </div>
            
        </div>
    </div>
    
</html>