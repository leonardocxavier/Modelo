<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    /*
        idm : sessionStorage.getItem('id_submenu_wiki'),
        doc : $(".note-editable*").html()
    */
    
    $id = filter_input(INPUT_POST,'idm');
    $id = addslashes($id);

    $document = filter_input(INPUT_POST,'doc');
    $document = addslashes($document);

    $sql = "UPDATE `wiki_submenu` set `documento`='$document' where `id_submenu`='$id' and `id_empresa`='$idempresa'";

    if($con->query($sql)){
        echo "<script>toastr['success']('Arquivo alterado com sucesso!');</script>";
    }else{
        echo "<script>toastr['warning']('OOPsss algo saiu errado...informe nosso suporte do erro: #W00005');</script>";
    }


?>