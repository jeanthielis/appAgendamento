<?php
include_once('conexao.php');

$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];

$sql="SELECT date_format(data,'%a') as dia, date_format(data, '%d/%m/%Y' ) as dataformatada, date_format(hora,'%H:%i') as horaformatada,id_agenda,cliente,servico,valor,restante,cores,bairro,cidade,situacao,celular FROM agenda WHERE data BETWEEN '$dataInicio' and '$dataFim' ORDER BY data" ;
$semana = array('Sun'=>'Dom','Mon'=>'Seg','Tue'=>'Ter','Wed'=>'Qua','Thu'=>'Qui','Fri'=>'Sex','Sat'=>'Sáb');
$sql2="SELECT sum(restante) as soma,count(id_agenda) as festa FROM agenda WHERE data BETWEEN '$dataInicio' and '$dataFim' ORDER BY data" ;

$resultado = mysqli_query($conn,$sql);
$resultadoSoma = mysqli_query($conn,$sql2);


while($result = mysqli_fetch_assoc($resultadoSoma)){
?>                   
       <div class="row text-light">
             
              
              <div class="col text-center">
              <span  class="badge badge-secondary p-2">
                     <i class="fas fa-1x fa-gift"></i>
                     <label><?php echo $result['festa']?></label>
              </span>
              <span  class="badge  badge-success p-2">
                     <i class="fas fa-1x fa-dollar-sign"></i>
                     <label><?php echo number_format($result['soma'],2,',','.')?></label><br>
                        
              </span> 
                    
              </div>
              
              
       </div>
       
<?php
}
?>
                    
<?php
while($linha=mysqli_fetch_assoc($resultado)){
      
       
?>            <br>
              
                     
                     <div style="border-radius:1rem;" class="card text-dark" >
                            <div class="card-body">
                                   <p class="card-title text-center">
                                          <strong><?php echo $linha['cliente']?><br></strong>
                                          <strong><?php echo $semana[$linha['dia']]." - ".$linha['dataformatada'].' - '. $linha['horaformatada']?></strong>

                                   </p>
                                   <p class="card-text text-dark">
                                          <strong>Serviços:</strong> <?php echo $linha['servico']?><br> 
                                          <strong>Cores:</strong><label contenteditable=”true” ><?php echo $linha['cores']?></label><br>  
                                          <strong>Valor: </strong> <?php echo 'R$'.number_format($linha['valor'],2,',','.')?> - <strong>Restante:</strong><?php echo 'R$'.number_format($linha['restante'],2,',','.')?><br>
                                          <strong>Local: </strong> <?php echo $linha['bairro']?> - <?php echo $linha['cidade']?><br>
                                          <strong>Celular: </strong> <?php echo $linha['celular']?> 
 
                                   </p>
                            </div>
                            <div style="border-radius:0rem 0rem 1rem 1rem"  class="card-footer">
                           
                                   <div class="text-center">
                                          <a class="text-secondary">
                                                 <i id="<?php echo $linha['id_agenda']?>" class="editar far fa-clipboard"></i>
                                                 
                                          </a> 
                                          <a class=" text-danger m-5">
                                                 <i id="<?php echo $linha['id_agenda']?>" class="deletar far fa-1x fa-trash-alt"></i>
                                                        </a>
                                          <a class="text-success">
                                                 <i id="<?php echo $linha['id_agenda']?>" class="concluido fas fa-check-double "></i>
                                          </a>
                            </div>
                           
                     </div>
                     </div>

              
              
            
     
<?php
}
mysqli_close($conn);
?>