<?php
  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  $idempresa = $_SESSION['idempresa'];
  $idempresa = addslashes($idempresa);

 /*
    idemp     : $('#empresa').val(),
    idperfil  : $('#perfil').val(), 
    nomeuser  : $('#nomeus').val(),
    loginname : $('#login').val(),
    password  : $('#pasus').val(),
    statuscad : $('#status').val(),
    img       : sessionStorage.getItem("imagemlogo")
*/   

//recebe variavais do javascript
    $idempresa   = $idempresa;  
    $idperf      = filter_input(INPUT_POST,'idperfil');
    $nome        = filter_input(INPUT_POST,'nomeuser');
    $nomelog     = filter_input(INPUT_POST,'loginname');
    $senha       = filter_input(INPUT_POST,'password');
    $status      = filter_input(INPUT_POST,'statuscad');
    $img         = filter_input(INPUT_POST,'img');

//ajusta senha
$pass_crypt = crypt($senha,'st');

$sql="INSERT INTO `usuarios`   (`id_empresa`, `id_perfil`, 
                                `login`, `senha`, `nome`, 
                                `status`, `cadastrado_em`)
                        VALUES ('$idempresa','$idperf',
                                '$nomelog','$pass_crypt','$nome',
                                '$status',now())";
echo $sql;

//verifica se o login já existe
$sqlexist  = "SELECT COUNT(*) as `contador` from `usuarios` where `login`='$nome'";
//echo $sqlexist;
 $respexist = $con->query($sqlexist);
 $count     = $respexist->fetch(); 

   if( $count['contador']>0){
       echo '<script>toastr["warning"]("Esste Login já esta cadastrado na base de dados.");listausuarios();</script>';
   }else{    
       $con->query($sql);  
       echo '<script>toastr["success"]("Registro gravado com sucesso!"); $("#janelacad").modal(\'hide\');</script>';
   }

?>