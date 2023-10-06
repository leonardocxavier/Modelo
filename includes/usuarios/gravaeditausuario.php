<?php
  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  $idempresa = $_SESSION['idempresa'];
  $idempresa = addslashes($idempresa);

 /*
    iduser    : id,
    idemp     : $('#empresa').val(),
    idperfil  : $('#perfil').val(), 
    nomeuser  : $('#nomeus').val(),
    loginname : $('#login').val(),
    img       : sessionStorage.getItem("imagemlogo")
*/   

//recebe variavais do javascript
    $idus        = filter_input(INPUT_POST,'iduser');  
    $idempresa   = $idempresa;  
    $idperf      = filter_input(INPUT_POST,'idperfil');
    $nome        = filter_input(INPUT_POST,'nomeuser');
    $nomelog     = filter_input(INPUT_POST,'loginname');
    $img         = filter_input(INPUT_POST,'img');

$sql="UPDATE `usuarios` set `id_empresa`='$idempresa', `id_perfil`='$idperf', 
                            `login`='$nomelog', `nome`='$nome'
                      Where `id_usuario`='$idus' and `id_empresa`='$idempresa'";

$sqlverif   = "SELECT COUNT(*) as `contador` From `usuarios` where `login`='$nomelog' and `id_empresa`='$idempresa' and `id_usuario`!='$idus'";
$respverif  = $con->query($sqlverif);
$dadosverif = $respverif->fetch();

if($dadosverif['contador']>0){
    echo '<script>toastr["warning"]("Esste Login já esta cadastrado na base de dados.Não pode ser Editado");</script>';
}else{ 
    if($con->query($sql)){
        echo '<script>toastr["success"]("Registro gravado com sucesso!");listausuarios();$("#modaledicao").modal(\'hide\');</script>';
        
    }else{      
        echo '<script>toastr["warning"]("OOPpssss. Ocorreu um erro aqui! Informe o suporte do erro: #U0002.");</script>';
    }
}


?>