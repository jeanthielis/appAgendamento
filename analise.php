<?php
$margem = 0.6; // 30% de lucro
$sql2="SELECT sum(valor) as soma,count(id_agenda) as festa,sum(entrada) as entrada,sum(valor)*$margem as lucro,sum(valor)/count(distinct month(data)) as media,(sum(valor)/count(distinct month(data)))*$margem as lucroMensal, sum(valor)-sum(valor)*$margem as despesa FROM agenda where situacao=1"; ;
include_once('conexao.php');
$resultadoSoma = mysqli_query($conn,$sql2);
while($result = mysqli_fetch_assoc($resultadoSoma)){
    $soma = 'R$'.number_format($result['soma'],2,',','.');
    $festa = $result['festa'];
    $entrada = 'R$'.number_format($result['entrada'],2,',','.');
    $lucro = 'R$'.number_format($result['lucro'],2,',','.');
    $media = 'R$'.number_format($result['media'],2,',','.');
    $lucroMensal = 'R$'.number_format($result['lucroMensal'],2,',','.');
    $despesas = 'R$'.number_format($result['despesa'],2,',','.');
}
?>
<html>
   <h4><strong>Informações Anuais</strong></h4>
    <br>
    <div class="row">
        <div class="col-6">
            <div class="alert bordaAnalise bordaRosa">
                <strong class='bordaRosa'>Faturamento</strong><br>
                <h4 class='bordaRosa'><strong><?php echo $soma?></strong></h4>
            </div>
            
        </div>
        <div class="col-6">
            <div class="alert bordaAnalise bordaVerde">
                <strong class='bordaVerde' for="">Concluidas</strong><br>
                <h4 class='bordaVerde'><strong><?php echo $festa?></strong></h4>
            </div>
            
        </div>
    </div>



    <div class="row">
        <div class="col-6">

            <div class="alert bordaAnalise bordaAzul">
                <strong class='bordaAzul' for="">Entrada</strong><br>
                <h4 class='bordaAzul'><strong><?php echo $entrada?></strong></h4>
            </div>
            
        </div>
        <div class="col-6">
            <div class="alert bordaAnalise bordaLaranja">
                 <strong class='bordaLaranja' for="">Lucro</strong><br>
                <h4 class='bordaLaranja'><strong><?php echo $lucro?></strong></h4>
               
            </div>    
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="alert bordaAnalise bordaRoxa">
                <strong class='bordaRoxa' for="">Média </strong><br>
                <h4 class='bordaRoxa'><strong><?php echo $media?></strong></h4>
            </div>
        </div>
        <div class="col-6">
            <div class="alert bordaAnalise bordaInfo">
                <strong class='bordaInfo' for="">Despesas</strong><br>
                <h4 class='bordaInfo'><strong><?php echo $despesas?></strong></h4>
            </div>
        </div>
    </div>
    <hr>
    <h4><strong>Informações Mensais</strong></h4><br>

    <div class="row">
        
        <div class="col-6">
            <div class="alert bordaAnalise bordaVermelha">
                <strong class='bordaVermelha' for="">Lucro </strong><br>
                <h4 class='bordaVermelha'><strong><?php echo $lucroMensal?></strong></h4>
                    
            </div>

            
        </div>
        <div class="col-6">

        </div>
    </div>
    
</html>