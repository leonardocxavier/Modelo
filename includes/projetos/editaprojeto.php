<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    /*
        mange : id
    */
    $status='';
    $members='';
    //passa variavies para do javascript para o php
    $idp=filter_input(INPUT_POST,'mange');
    $idp=addslashes($idp);

    $select="SELECT * FROM `projetos` where `id_projeto`='$idp' and `id_empresa`='$idempresa'";
    $respsel=$con->query($select);
    $dadosprojeto=$respsel->fetch();

    $task_member = $dadosprojeto['membros'];
    if(empty($task_member)){
        $members='Não há membros neste projeto.';
    }else{
        $selectmemb="SELECT `login`,`nome` FROM `usuarios` WHERE `id_usuario` in ($task_member)";
        $respmember=$con->query($selectmemb);
        while($row1 = $respmember->fetch()){
            $img_gravatar = get_gravatar($row1['login']);
            $members.='<li class="list-inline-item">
                            <img alt="Avatar" class="img-circle img-fluid" title="'.$row1['nome'].'" src="'.$img_gravatar.'">
                    </li>';
        }
    }

?>    
<div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Dados Gerais</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool bg-success" onclick="gravaeditaprojeto('<?php echo $idp;?>');">
                  <i class="fas fa-save"></i> Gravar
                </button>
                <button type="button" class="btn btn-tool" onclick="projetos();">
                  <i class="fa fa-arrow-left"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="row">  
              <div class="form-group col-sm-8">
                <label for="inputName">Nome do Projeto</label>
                <input type="text" id="inputName" class="form-control" value="<?php echo htmlentities($dadosprojeto['nome']);?>">
              </div>
              <div class="form-group col-sm-4">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select">
                    <?php
                        $stat = $dadosprojeto['status'];
                            if($stat=="A"){
                                echo '  <option value="">Selecione</option>
                                <option value="A" selected="">Em Análise</option>
                                <option value="C">Cancelado</option>
                                <option value="S">Em Andamento</option>';
                            } 
                            if($stat=="C"){
                                echo '  <option value="">Selecione</option>
                                <option value="A">Em Análise</option>
                                <option value="C" selected="">Cancelado</option>
                                <option value="S">Em Andamento</option>';
                            }
                            if($stat=="S"){
                                echo '  <option value="">Selecione</option>
                                <option value="A">Em Análise</option>
                                <option value="C">Cancelado</option>
                                <option value="S" selected="">Em Andamento</option>';
                            }                          
                    ?>
                </select>
              </div>
              <div class="form-group col-sm-12">
                <label for="inputDescription">Descrição do Projeto</label>
                <textarea id="inputDescription" class="form-control" rows="4"><?php echo htmlentities($dadosprojeto['descricao']);?></textarea>
              </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Cliente/Empresa</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputClientCompany">Nome Cliente</label>
                    <input type="text" id="inputClientCompany" value="<?php echo htmlentities($dadosprojeto['cliente']);?>" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Responsável pelo projeto</label>
                    <input type="text" id="inputProjectLeader" class="form-control" value="<?php echo htmlentities($dadosprojeto['responsavel']);?>">
                 </div>
            </div>
            <!-- /.card-body -->
            </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Membros</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool bg-success">
                  <i class="fas fa-plus"></i> Adicionar
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                   
                    <?php echo $members;?>
         
                </div>
                <div class="form-group">
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->  
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<div id="mensagem"></div>