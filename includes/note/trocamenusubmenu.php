<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    $id = filter_input(INPUT_POST,'idm');
    $id = addslashes($id);

    //selecione ops menus presentes no sistema
    $sql     = "SELECT *FROM `wiki_menu` WHERE `id_empresa`='$idempresa'";
    $respsql = $con->query($sql);
    $menu_mostra_select = '';
    while ($row = $respsql->fetch()){
        $menu_mostra_select .='<option value="'.$row['id_menu'].'">'.htmlentities($row['menu']).'</option>'; 
    }

 ?> 
 <div class="modal-header">
    <h4 class="modal-title">Trocar Menu do Documento</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div id="messages"></div>
        <div class="col-sm-12">
            <select class="form-control" id="novo_menu">
                <?php 
                    echo $menu_mostra_select; 
                ?>
            </select> 
        </div>
    </div>
</div>  
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="gravatrocasubmenuwiki('<?php echo $id;?>');">Gravar</button>
</div>          
