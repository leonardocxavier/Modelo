<?php
  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  $idempresa = $_SESSION['idempresa'];
  $idempresa = addslashes($idempresa);

    /*
       idusuario : id
    */

    $iduser = filter_input(INPUT_POST,'idusuario');
    
    if($iduser==1){
        echo '<script>toastr["warning"]("Este usuário não pode ser inativado!");</script>'; 
        exit(); 
    }

    //segurança adicional contra mysql_injection
    $id = addslashes($iduser);

    //verifica o status atual da empresa
    $sqlstat = "SELECT *from `usuarios` where id_usuario='$iduser' and `id_empresa`='$idempresa'";
    $respst  = $con->query($sqlstat);
    $dados   = $respst->fetch();


    if($dados['status']=='Inativo'){
        //monta SQLpara inativar o registro
        $sql = "UPDATE `usuarios` set `status`='Ativo' where `id_usuario`='$iduser'";
        $con->query($sql);  
        echo '<script>toastr["success"]("Registro Ativado com sucesso!")';
    }else{
        //monta SQLpara inativar o registro
        $sql = "UPDATE `usuarios` set `status`='Inativo' where `id_usuario`='$iduser'";
        $con->query($sql);  
        echo '<script>toastr["error"]("Registro Inativado com sucesso!")';
    }
    
 ?>