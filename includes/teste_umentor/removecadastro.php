<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

/*
    idcad : id
*/

$id = filter_input(INPUT_POST,'idcad');

$sqlremovecad="DELETE FROM `cadastros` WHERE `id`='$id'";
$con->query($sqlremovecad);

echo "<script>toastr['success']('Excluído com sucesso!');</script>";

