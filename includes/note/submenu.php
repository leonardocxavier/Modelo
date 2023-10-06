<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    $id = filter_input(INPUT_POST,'idm');
    $id = addslashes($id);

    //selecione ops menus presentes no sistema
    $sql     = "SELECT *FROM `wiki_submenu` WHERE `id_empresa`='$idempresa' and `id_menu`='$id'";
    $respsql = $con->query($sql);
    
    //declara variavel monta menu
    $monta_submenu='';
    while ($row = $respsql->fetch()){
        //ajusta tamanho do teexto dentro do botão
        $textmostrar = substr($row['titulo'],0,23);
        
        $monta_submenu .='  <div class="callout callout-danger p-1 mb-1" ondblclick="mostradocumento_wiki('."'".$row['id_submenu']."'".')">
                            <div class="card-header p-0 mr-2" title="'.htmlentities($row['descricao']).'">
                                <h5 class="card-title" title="'.htmlentities($row['titulo']).'">'.$textmostrar.'</h5>
                                    <div class="card-tools m-0 p-0">
                                        <span class="badge badge-info right" data-toggle="modal" data-target="#modaledicao" title="Editar Menu" onclick="editasubmenu_wiki('."'".$row['id_submenu']."'".');">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="badge badge-warning right" data-toggle="modal" data-target="#modaledicao" title="Trocar Documento De Menu." onclick="trocasubmenu_wiki('."'".$row['id_submenu']."'".');"><i class="fas fa-exchange-alt"></i></span>
                                        <span class="badge badge-danger right" title="Trocar Documento De Menu." onclick="removesubmenu_wiki('."'".$row['id_submenu']."'".');"><i class="fas fa-trash"></i></span>
                                    </div>
                            </div>
                        </div>';
    }

?>

<div class="card-body p-0 h-100" style="max-height: 90%;">
    <button type="button" data-toggle="modal" data-target="#modaledicao" class="mb-1 btn btn-outline-info btn-block btn-sm" onclick="adicionasubmenu('<?php echo $id; ?>');">
    <i class="fa fa-plus"></i> 
        Documento
    </button>
    <div style="max-height:85%;overflow:auto;">
        <?php
            echo $monta_submenu;
        ?>
    </div>   
</div>