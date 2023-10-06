<?php

    require_once '../../../db/lock_page.php'; 
    require_once '../../../db/conection.php'; 

    /*
        title : $('#titulo').val(),
        stats : $('#status').val(),
        desc  : $('#descricao').val()
    */
    $textmostrar = '';
    $idempresa   = $_SESSION['idempresa'];
    $idempresa   = addslashes($idempresa);
    $idproj      = filter_input(INPUT_POST,'idpr');

    $sqlpending="SELECT *FROM `tasks` where `id_empresa`='$idempresa' and `id_projeto`='$idproj' and `status`='P'";
    $resppending = $con->query($sqlpending);
    $itens_pending = '';

    while ($row = $resppending->fetch()){
        $textmostrar = substr($row['titulo'],0,23);
        $itens_pending .= '<div id="drag'.$row['id_task'].'" draggable="true" class="card card-info card-outline">
                                <div class="card-header">
                                    <h5 class="card-title" title="'.$row['titulo'].'">'.htmlentities($textmostrar).'</h5>
                                    <div class="card-tools">
                                    <a href="javascript:;" class="btn btn-tool btn-link" data-toggle="modal" data-target="#modaledicao" onclick="editatask_task('."'".$row['id_task']."'".');">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-tool" onclick="excluir_task('."'".$row['id_task']."'".');">
                                    <i class="fas fa-trash"></i>
                                    </a>
                                    </div>
                                </div>
                            </div>';
} 

    echo $itens_pending;
 
?>