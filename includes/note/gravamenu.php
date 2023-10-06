<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
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

    $titulo     = filter_input(INPUT_POST, 'title');
    $status     = filter_input(INPUT_POST, 'stats');
    $descricao  = filter_input(INPUT_POST, 'desc');

    $titulo    = addslashes($titulo);
    $status    = addslashes($status);
    $descricao = addslashes($descricao);

    $sql = "INSERT INTO `wiki_menu`(`id_empresa`, `menu`, `descricao`, `status`) 
                            VALUES ('$idempresa','$titulo','$descricao','$status')";

    if ($con->query($sql)){
        echo "Cadastrado com sucesso!";
    }else{
        echo "OOPs ocorreu um erro, informe o suporte o código de erro: #W0001";
    }
       
?>

