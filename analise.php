<?php
$margem = 0.6; // 30% de lucro
$sql2="SELECT sum(valor) as soma,count(id_agenda) as festa,sum(entrada) as entrada,sum(valor)*$margem as lucro,sum(valor)/count(distinct month(data)) as media,(sum(valor)/count(distinct month(data)))*$margem as lucroMensal FROM agenda where situacao=1"; ;
include_once('conexao.php');
$resultadoSoma = mysqli_query($conn,$sql2);
while($result = mysqli_fetch_assoc($resultadoSoma)){
    $soma = number_format($result['soma'],2,',','.');
    $festa = $result['festa'];
    $entrada = number_format($result['entrada'],2,',','.');
    $lucro = number_format($result['lucro'],2,',','.');
    $media = number_format($result['media'],2,',','.');
    $lucroMensal = number_format($result['lucroMensal'],2,',','.');
}
?>
<html>
   
    <br>
    <hr>
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="alert bordaAnalise">
                <strong class='text-secondary' for="">Faturamento Anual</strong>
                <strong class='text-secondary'><h1><?php echo $soma?></strong></h1><br>
            </div>
            
        </div>
        <div class="col-md-6 mb-3">
            <div class="alert bordaAnalise">
                <strong class='text-secondary' for="">Festa Concluidas</strong>
                <strong class='text-secondary'><h1><?php echo $festa?></strong></h1><br>
            </div>
            
        </div>
    </div>


    <div class="row">
        <div class="col-sm">

            <div class="alert bordaAnalise">
                <strong class='text-secondary' for="">Entrada</strong><br>
                <strong class='text-secondary'><h1><?php echo $entrada?></strong></h1><br>
            </div>
            
        </div>
        <div class="col-sm">
            <div class="alert bordaAnalise">
                 <strong class='text-secondary' for="">Lucro Anual</strong><br>
                <strong class='text-secondary'><h1><?php echo $lucro?></strong></h1><br>
               
            </div>    
        </div>
    </div>


    <div class="row">
        <div class="col-sm">
            <div class="alert bordaAnalise">
                <strong class='text-secondary' for="">Média Mensal</strong>
                <strong class='text-secondary'><h1><?php echo $media?></strong></h1><br>
            </div>
            
        </div>
        <div class="col-sm">
        <div class="alert bordaAnalise">
            <strong class='text-secondary' for="">Lucro Mensal</strong>
            <strong class='text-secondary'><h1><?php echo $lucroMensal?></strong></h1><br>
                
            </div>
            
        </div>
    </div>
    
</html>