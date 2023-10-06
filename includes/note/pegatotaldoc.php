<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa=$_SESSION['idempresa'];

    $id      = filter_input(INPUT_POST,'idm');
    $id_menu = addslashes($id);

    $selectcount  = "SELECT COUNT(*) as contador FROM `wiki_submenu` WHERE `id_menu`='$id_menu' and `id_empresa`='$idempresa'";
    $respcontador = $con->query($selectcount);
    $dados = $respcontador->fetch();
    echo $dados['contador'];

?>