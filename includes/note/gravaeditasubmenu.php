<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
        idm   : id,
            title : $("#nome_menu").val(),
            desc  : $("#desc_menu").val(),
            doc   : $(".note-editable*").html(),
            stats : $("#status_menu").val()   
    */ 
    $idempresa='';

    if($_SESSION['idempresa']){
        $idempresa=$_SESSION['idempresa'];
    }else{
        $idempresa='0';
    }

    $id = filter_input(INPUT_POST,'idm');
    $id = addslashes($id);

    $titulo     = filter_input(INPUT_POST, 'title');
    $status     = filter_input(INPUT_POST, 'stats');
    $descricao  = filter_input(INPUT_POST, 'desc');

    $titulo    = addslashes($titulo);
    $status    = addslashes($status);
    $descricao = addslashes($descricao);

    $sql = "UPDATE `wiki_submenu` set `titulo`='$titulo',`descricao`='$descricao', `status`='$status'
                                    where id_empresa='$idempresa' and `id_submenu`='$id'";

    if ($con->query($sql)){
        echo "Cadastrado com sucesso!";
    }else{
        echo "OOPs ocorreu um erro, informe o suporte o código de erro: #W0001";
    }
       
?>

