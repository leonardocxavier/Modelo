<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  //variaveis revebidas do Ajax
  /*
    name    : $('#nome').val(),
    mail    : $('#mail').val(),
    dateadm : $('#datead').val()
  */

  $nomecad = filter_input(INPUT_POST,'name');
  $mailcad = filter_input(INPUT_POST,'mail');
  $datacad = filter_input(INPUT_POST,'dateadm');

  if(isset($nomecad)){  
    $sqlinsert="INSERT INTO `cadastros` (`nome`, `email`, `dataadm`, `datahcad`, `datahupdt`) 
                              VALUES  ('$nomecad','$mailcad','$datacad',NOW(),NOW())";
    $con->query($sqlinsert);
    echo '<script>toastr["success"]("Registro gravado com sucesso!");listausuarios();$("#modaledicao").modal(\'hide\');</script>';
  }else{
    echo '<script>toastr["warning"]("OOPpssss. Você não preencheu o campo nome.<br/> Preencha este campo e tente novamente!");</script>';
  }

?>