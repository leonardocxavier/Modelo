<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
       mange : id
    */

    //recebe variaveis do javascript
    $id = filter_input(INPUT_POST,'idpr');

    $id = addslashes($id);


?>    

<div class="modal-header">
    <h4 class="modal-title">Nova Tarefa</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div id="messages"></div>
        <div class="form-group col-sm-9">
            <label>Título da Tarefa</label>
            <input type="text" id="titulo" class="form-control">
        </div>
        <div class="form-group col-sm-3">
            <label>Status</label>
            <select id="status" class="form-control custom-select">
                <option value="P" selected="">Pendente</option>
                <option value="E">Em Execução</option>
                <option value="V">Em Validação</option>
                <option value="F">Finalizada</option>
                <option value="C">Cancelada</option>
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label>Descrição Da Tarefa</label>
            <textarea id="descricao" class="form-control" rows="4"></textarea>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="gravanovatarefa('<?php echo $id;?>');">Gravar</button>
</div>