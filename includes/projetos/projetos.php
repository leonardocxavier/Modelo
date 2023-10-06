<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
        idm : id
    */

    //recebe variaveis do javascript
    $id = filter_input(INPUT_POST,'idm');
  if (isset($id)){
    $id=addslashes($id);
  }
    


?>    
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Projetos</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" onclick="novoprojeto();">
              <i class="fas fa-plus"></i> Novo Projeto
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 20%">
                          Nome Projeto
                      </th>
                      <th style="width: 30%">
                          Membros
                      </th>
                      <th>
                          Progresso (Tarefas)
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%" class="text-center">
                            Ações
                      </th>
                  </tr>
              </thead>
              <tbody id="mostraprojetos">
              
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
</div>
<div id="mensagem"></div>