<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
        idm   : id,
        title : $("#nome_menu").val(),
        stats : $("#status_menu").val(),
        desc  : $("#desc_menu").val()
    */ 
    $idempresa='';

    if($_SESSION['idempresa']){
        $idempresa=$_SESSION['idempresa'];
    }else{
        $idempresa='0';
    }

    $id         = filter_input(INPUT_POST, 'idm');
    $titulo     = filter_input(INPUT_POST, 'title');
    $status     = filter_input(INPUT_POST, 'stats');
    $descricao  = filter_input(INPUT_POST, 'desc');

    $id        = addslashes($id);
    $titulo    = addslashes($titulo);
    $status    = addslashes($status);
    $descricao = addslashes($descricao);

    $sql = "UPDATE `wiki_menu` SET `menu`='$titulo', `descricao`='$descricao', `status`= '$status'
                            WHERE id_menu='$id'";

    if ($con->query($sql)){
        echo "Alterado com sucesso!";
    }else{
        echo "OOPs ocorreu um erro, informe o suporte o código de erro: #W0002";
    }
       
?>

