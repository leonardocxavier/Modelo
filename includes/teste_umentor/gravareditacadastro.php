<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  //variaveis revebidas do Ajax
  /*
    idcad   : id,
    name    : $('#nome').val(),
    mail    : $('#mail').val(),
    dateadm : $('#datead').val()
  */

  $id      = filter_input(INPUT_POST,'idcad');
  $nomecad = filter_input(INPUT_POST,'name');
  $mailcad = filter_input(INPUT_POST,'mail');
  $datacad = filter_input(INPUT_POST,'dateadm');

    $sqlinsert="UPDATE `cadastros` SET `nome`='$nomecad', `email`='$mailcad', `datahupdt`= NOW() 
                                   WHERE `ID`='$id'";
    $con->query($sqlinsert);
    echo '<script>toastr["success"]("Registro gravado com sucesso!");$("#modaledicao").modal(\'hide\');</script>';

