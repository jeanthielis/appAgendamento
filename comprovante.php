<?php
 include_once('conexao.php');

 $id = intval($_POST['id']);

$sql="SELECT date_format(data, '%d/%m/%Y' ) as dataformatada, date_format(hora,'%H:%i') as horaformatada,id_agenda,cliente,servico,valor,restante,cores,bairro,cidade,situacao,celular FROM agenda WHERE id_agenda=$id" ;
$resultado=mysqli_query($conn,$sql);

while($linha=mysqli_fetch_assoc($resultado)){
?>  
    <div class="row p-2">
        <div class="col">
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col p-1">
                    <br>
                    <br>
                    <img src="logoOriginal.png" width="130" height="100"><br>
                </div>
                <div class="col-8 p-1">
                <br>
                    <strong><label for="">Sopro de Alegria Vix</label></strong><br>
                    <label for="">CNPJ:47.861.674/0001-44</label>
                    <label for="">Rua: Sao Pedro,696,Jacaraipe, Serra-ES</label><br>
                    <label for="">Celular:(27)98107-1336</label><br>
                    <label for="">soprodealegriavix@gmail.com</label><br>
                    
                </div>
                
            </div>
            
            <div class="row">
                <div class="col">
                   

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-7">
                <strong>Cliente</strong><br>
                <label><?php echo $linha['cliente'];?></label>
                </div>
               
               
            </div>
            <div class="row">
                <div class="col">
                <strong>Local</strong><br>
                <label><?php echo $linha['bairro'].' - '.$linha['cidade']?> </label>
                </div>
                <div class="col">
                <strong>Celular</strong><br>
                <label><?php echo $linha['celular'];?></label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <strong>Serviços</strong><br>
                    <label><?php echo $linha['servico']?> </label>
                    </div>
                <div class="col">
                    <strong>Valor</strong><br>
                    <label><?php echo 'R$'.$linha['valor']?> </label>

                </div>
            </div>
            <div class="row">
                <div class="col">
                <strong>Entrada</strong><br>
                <label><?php echo 'R$'.$linha['valor']-$linha['restante']?> </label>
                </div>
                <div class="col">
                <strong>Restante</strong><br>
                <label><?php echo 'R$'.$linha['restante']?> </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <strong>Data/Hora</strong><br>
                <label><?php echo $linha['dataformatada'].' - '.$linha['horaformatada']?> </label>
                </div>
                <div class="col">
                <strong>Cores</strong><br>
                <label><?php echo $linha['cores']?> </label>
                </div>
            </div>
       
        </div>
        <div class="col">
        
        </div>
        </div>
    </div>
<?php    
}

    mysqli_close($conn);
?>