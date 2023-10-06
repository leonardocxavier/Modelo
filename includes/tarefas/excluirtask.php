<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
        id_task : id
    */
    
    $idempresa=$_SESSION['idempresa'];
    $idempresa=addslashes($idempresa);

    //passa para o php as variaveis do javascript
    $idt = filter_input(INPUT_POST,'id_task');
    $idt = addslashes($idt);
    $wattask="SELECT *From `tasks` where `id_task`='$idt' and `id_empresa`='$idempresa'";
    $respselct = $con->query($wattask);
    $dadostask = $respselct->fetch();

    //excluir a task
    $deletetask="DELETE FROM `tasks` where `id_task`='$idt' and `id_empresa`='$idempresa'";
    if($con->query($deletetask)){
        echo $dadostask['status'];
    }else{
        echo "Error";
    }


  



?>