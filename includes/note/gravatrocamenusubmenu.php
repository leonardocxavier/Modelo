<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    /*
        idm    : id,
        id_sub : sessionStorage.getItem('id_submenu_wiki')
    */

    $id = filter_input(INPUT_POST,'idm');
    $id = addslashes($id);

    $idsub = filter_input(INPUT_POST,'id_sub');
    $idsub = addslashes($idsub); 

    //selecione ops menus presentes no sistema
    $sql     = "UPDATE `wiki_submenu` set `id_menu`='$id' where `id_submenu`='$idsub' and `id_empresa`='$idempresa'";

    if($con->query($sql)){
        echo "<script>toastr['success']('Menu do Documento Alterado Com Sucesso!');</script>";
    }else{
        echo "<script>toastr['warning']('OOPsss algo saiu errado...Informe nosso suporte do erro: #W00006');</script>";
    }

?>    