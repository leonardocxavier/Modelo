<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    /*
        idm : id  
    */
    
    $id = filter_input(INPUT_POST,'idm');
    $id = addslashes($id);

    //selecione ops menus presentes no sistema
    $sql     = "SELECT *FROM `wiki_submenu` WHERE `id_empresa`='$idempresa' and `id_submenu`='$id'";
    $respsql = $con->query($sql);
    $dados   = $respsql->fetch();

    echo $dados['documento']; 

?>
