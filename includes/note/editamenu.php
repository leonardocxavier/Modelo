<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
        idm : id
    */

    //recebe variaveis do javascript
    $id = filter_input(INPUT_POST,'idm');

    $id=addslashes($id);

    $sql="SELECT *from `wiki_menu` where `id_menu`='$id'";
    $respsql = $con->query($sql);
    $dados = $respsql->fetch();

?>    

<div class="modal-header">
    <h4 class="modal-title">Editar Menu</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div id="messages"></div>
        <div class="col-sm-9">
            <div class="form-group">
                <label>Título</label>
                <input type="text" value="<?php echo $dados['menu'];?>" id="nome_menu" class="form-control">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Status</label>
                <select id="status_menu" class="form-control">
                    <option>Ativo</option>
                    <option>Inativo</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Descrição</label>
                <textarea type="text" id="desc_menu" class="form-control"><?php echo htmlentities($dados['descricao']);?></textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="gravaeditamenuwiki('<?php echo $id;?>');">Gravar</button>
</div>