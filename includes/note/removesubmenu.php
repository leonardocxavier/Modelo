<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    $id = filter_input(INPUT_POST,'idm');
    $id = addslashes($id);

    $sql="DELETE from `wiki_submenu` WHERE id_submenu='$id' and `id_empresa`=$idempresa";
    $con->query($sql);

    echo "<script>toastr['success']('Registro removido com sucesso!');</script></script>";

?>