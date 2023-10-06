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
  
    $sql = "INSERT INTO `tasks` (`id_empresa`, `id_projeto`, `titulo`, `descricao`, `status`)
                         VALUES ('$idempresa','$id_proj','$titlo','$descricao','$status')";

    if($con->query($sql)){
        echo "<script>toastr['success']('Tarefa Grava Com Sucesso!');</script>";
    }else{ 
        echo "<script>toastr['warning']('Ooops! Ocorreu um erro, informe o suporte do erro: #T00001');</script>";
    }
?>