<?php

    require_once '../../../db/lock_page.php'; 
    require_once '../../../db/conection.php'; 

      /*
        idpr : id
    */
    
    $idempresa=addslashes($_SESSION['idempresa']);
    $idproj   =filter_input(INPUT_POST,'idpr');

    $sqlpending="SELECT *FROM `tasks` where `id_empresa`='$idempresa' and `id_projeto`='$idproj' and `status`='F'";
    $resppending = $con->query($sqlpending);
    $itens_pending = '';

    while ($row = $resppending->fetch()){
        $itens_pending .= ' <div id="drag'.$row['id_task'].'" draggable="true" class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <span>
                                        '.$row['titulo'].'
                                        </span>
                                    </h4>
                                </div>
                            </div>'; 
} 

    echo $itens_pending;
 
?>