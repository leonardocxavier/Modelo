<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

/*
    mange : id
*/

$id = filter_input(INPUT_POST,'mange');

$sqlremove="DELETE FROM `projetos` WHERE `id_projeto`='$id'";
$con->query($sqlremove);

$sqlremovetask="DELETE FROM `tasks` WHERE `id_projeto`='$id'";
$con->query($sqlremovetask);

echo "<script>toastr['success']('Excluído com sucesso!');</script>";

