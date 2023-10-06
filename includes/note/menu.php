<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa=$_SESSION['idempresa'];
    //selecione ops menus presentes no sistema
    $sql     = "SELECT *FROM `wiki_menu` WHERE `id_empresa`='$idempresa'";
    $respsql = $con->query($sql);
    
    //declara variavel monta menu
    $monta_menu='';
    while ($row = $respsql->fetch()){
        //ajusta tamanho da linha para monstrar no menu
        $textmostrar = substr($row['menu'],0,23);
        $id_menu = $row['id_menu'];
        $selectcount  = "SELECT COUNT(*) as contador FROM `wiki_submenu` WHERE id_menu='$id_menu'";
        $respcontador = $con->query($selectcount);
        $dados = $respcontador->fetch();
        $monta_menu .='  <div class="callout callout-danger p-1 mb-1" id="indice_'.$row['id_menu'].'" ondblclick="abresubmenu_wiki('."'".$row['id_menu']."'".');">
                            <div class="card-header p-0 mr-2" title="'.htmlentities($row['descricao']).'">
                                <h5 class="card-title" title="'.htmlentities($row['menu']).'" >'.$textmostrar.'</h5>
                                    <div class="card-tools m-0 p-0">
                                    <span class="badge badge-info right" title="Total de documentos neste menu." id="total_doc'.$row['id_menu'].'">'.$dados['contador'].'</span>
                                    <span class="badge badge-edit bg-success right" data-toggle="modal" data-target="#modaledicao" title="Editar Menu" onclick="editamenu_wiki('."'".$row['id_menu']."'".');"><i class="fas fa-edit"></i></span>
                                    <span class="badge badge-danger right" title="Remover Menu." onclick="removemenu_wiki('.$row['id_menu'].');"><i class="fas fa-trash"></i></span>   
                                </div>
                            </div>
                        </div>';
    }

?>

<div class="card-body p-0">
    <button type="button" data-toggle="modal" data-target="#modaledicao" class="mb-1 btn btn-outline-info btn-block btn-sm" onclick="adicionamenuwiki();">
        <i class="fa fa-plus"></i> 
        Menu
    </button>
    <?php
        echo $monta_menu;
    ?>
</div>