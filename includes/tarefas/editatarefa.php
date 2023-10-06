<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
        mange : id
    */

    $idempresa=$_SESSION['idempresa'];
    $idempresa=addslashes($idempresa);

    //recebe variaveis do javascript
    $id = filter_input(INPUT_POST,'mange');
    $id = addslashes($id);

    $select_task="SELECT *FROM `tasks` where `id_task`='$id'";
    $resptask=$con->query($select_task);
    $dadostask=$resptask->fetch();

?>    

<div class="modal-header">
    <h4 class="modal-title">Edição De Tarefa</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div id="messages"></div>
        <div class="form-group col-sm-9">
            <label>Título da Tarefa</label>
            <input type="text" id="titulo" value="<?php echo htmlentities($dadostask['titulo']);?>" class="form-control">
        </div>
        <div class="form-group col-sm-3">
            <label>Status</label>
            <select id="status" class="form-control custom-select">
               
                    <?php 
                    $status= '';
                    $status = $dadostask['status'];
                        if($status==="P"){
                            echo '  <option value="P" selected="">Pendente</option>
                                    <option value="E">Em Execução</option>
                                    <option value="V">Em Validação</option>
                                    <option value="F">Finalizada</option>
                                    <option value="C">Cancelada</option>';
                        }
                        if($status==="E"){
                            echo '  <option value="P">Pendente</option>
                                    <option value="E" selected="">Em Execução</option>
                                    <option value="V">Em Validação</option>
                                    <option value="F">Finalizada</option>
                                    <option value="C">Cancelada</option>';
                        }
                        if($status==="V"){
                            echo '  <option value="P">Pendente</option>
                                    <option value="E">Em Execução</option>
                                    <option value="V" selected="">Em Validação</option>
                                    <option value="F">Finalizada</option>
                                    <option value="C">Cancelada</option>';
                        }
                        if($status==="C"){
                            echo '  <option value="P">Pendente</option>
                                    <option value="E">Em Execução</option>
                                    <option value="V">Em Validação</option>
                                    <option value="F">Finalizada</option>
                                    <option value="C" selected="">Cancelada</option>';
                        }
                    ?>
                     
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label>Descrição Da Tarefa</label>
            <textarea id="descricao" class="form-control" rows="4"><?php echo htmlentities($dadostask['descricao']);?></textarea>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="gravaeditatarefa('<?php echo $id;?>');">Gravar</button>
</div>