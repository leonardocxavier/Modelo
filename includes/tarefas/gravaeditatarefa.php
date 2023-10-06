<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
        mange : id,
        title : $('#titulo').val(),
        stats : $('#status').val(),
        desc  : $('#descricao').val()
    */
    
    $idempresa=$_SESSION['idempresa'];
    $idempresa=addslashes($idempresa);
    
    //passa variáveis para o php
    $id_proj   = filter_input(INPUT_POST,'mange');
    $id_proj   = addslashes($id_proj);
    $titlo     = filter_input(INPUT_POST,'title');
    $titlo     = addslashes($titlo);
    $status    = filter_input(INPUT_POST,'stats');
    $status    = addslashes($status);
    $descricao = filter_input(INPUT_POST,'desc');
    $descricao = addslashes($descricao);
  
    $verifstatus="SELECT *FROM `tasks` WHERE `id_task`='$id_proj' and `id_empresa`='$idempresa'";
    $respverif=$con->query($verifstatus);
    $dadosresp = $respverif->fetch();

    $sql = "UPDATE `tasks` set `titulo`='$titlo', `descricao`='$descricao', `status`='$status'
                         WHERE `id_task`='$id_proj' and `id_empresa`='$idempresa'";

    if($con->query($sql)){
        echo $dadosresp['status'];
    }else{ 
        echo "<script>toastr['warning']('Ooops! Ocorreu um erro, informe o suporte do erro: #EDT00002');</script>";
    }
?>