<?php
 include_once('conexao.php');

 $id = intval($_POST['id']);

 $sql="UPDATE agenda SET situacao = 1 where id_agenda='$id' order by desc";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
?>