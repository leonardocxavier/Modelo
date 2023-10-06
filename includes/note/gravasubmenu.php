<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    /*
        idm   : id,
        title : $("#nome_menu").val(),
        desc  : $("#desc_menu").val(),
        doc   : $(".note-editable*").html(),
        stats : $("#status_menu").val()
    */

    //passa as variaveis do javascript para o php
    $id     = filter_input(INPUT_POST,'idm');
    $id     = addslashes($id);
    
    $titulo = filter_input(INPUT_POST,'title');
    $titulo = addslashes($titulo);
    
    $descr  = filter_input(INPUT_POST,'desc');
    $descr  = addslashes($descr);
    
    $docum  = filter_input(INPUT_POST,'doc');
    $docum  = addslashes($docum);

    $status = filter_input(INPUT_POST,'stats');
    $status = addslashes($status);

$sql="INSERT INTO `wiki_submenu` (`id_empresa`, `id_menu`, `titulo`, `descricao`, `documento`, `status`)
                         VALUES  ('$idempresa','$id','$titulo','$descr','$docum','$status')";

if($con->query($sql)){
    //recupera os dados do submenu gravados
    echo 'Gravado com sucesso!';
}else{
    echo 'OOpsss Ocorreu um erro na gravação, informe o suporte deste erro: #W00003';
}


?>