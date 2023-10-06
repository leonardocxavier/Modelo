<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    $id = filter_input(INPUT_POST,'idm');
    $id = addslashes($id);

    //verifica se tem documentos dentro do menu
    $sqldoc  = "SELECT COUNT(*) as `contador` FROM `wiki_submenu` where `id_menu`='$id' and `id_empresa`='$idempresa'";
    $respdoc = $con->query($sqldoc);
    $conter  = $respdoc->fetch();

    if($conter['contador']==='0'){
      $sqldel = "DELETE from `wiki_menu` where `id_menu`='$id' and `id_empresa`='$idempresa'";
      if($con->query($sqldel)){
        echo '<script>toastr["success"]("Registro Removido com sucesso!")</script>';
      }else{
        echo '<script>toastr["success"]("OOPsss Ocorreu um erro, informe o suporte do erro: #WD0001!")</script>';
      }
      
    }else{  
      echo '<script>toastr["info"]("Este item de Menu contém registros de documentos.<br/>Remova os documentos e após remover todos registros proceda para remover o item de menu.")</script>';
    }


?>