<?php
include_once('conexao.php');


$sql="SELECT date_format(data, '%d/%m/%Y' ) as dataformatada, date_format(hora,'%H:%i') as horaformatada,id_agenda,cliente,servico,valor,restante,cores,bairro,cidade,situacao FROM agenda WHERE situacao=1 ORDER BY data" ;
$resultado = mysqli_query($conn,$sql);

while($linha=mysqli_fetch_assoc($resultado)){
?>            
              

                     <div class="card text-dark" >
                     <i class=" position-absolute text-success fas fa-check m-1 fa-2x "></i>
                     <div class="card-body">
                     <p class="card-title text-center">
                            <?php echo $linha['cliente']?><br>
                            <?php echo $linha['dataformatada'].' - '. $linha['horaformatada']?>
                     </p>

                            <p class="card-text text-dark">
                            <strong>Serviços:</strong> <?php echo $linha['servico']?><br> 
                                   <strong>Valor: </strong> <?php echo 'R$'.number_format($linha['valor'],2,',','.')?> - <strong>Restante:</strong><?php echo 'R$'.number_format($linha['restante'],2,',','.')?><br>
                                   <strong>Local: </strong> <?php echo $linha['bairro']?> - <?php echo $linha['cidade']?> 
                            </p>
                     </div>
                     <div class="card-footer">
                            <div class="text-center">
                            <a class=" m-5 text-secondary">
                                   <i id="<?php echo $linha['id_agenda']?>" class="editar far fa-clipboard"></i>
                                   
                            </a> 
                            <a class=" m-5 text-danger ">
                                   <i id="<?php echo $linha['id_agenda']?>" class="deletar far fa-1x fa-trash-alt"></i>
                            </a>
                            

                            </div>
                           
                     </div>
                     </div>
                     <br>

             
              
            
     
<?php
}
mysqli_close($conn);
?>