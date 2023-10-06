<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    /*
      idm : id
    */

    //recebe variaveis do javascript
    $id = filter_input(INPUT_POST,'idm');

?>   

<div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Dados Gerais</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool bg-success" onclick="gravaprojeto();">
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
                <input type="text" id="inputName" class="form-control" value="">
              </div>
              <div class="form-group col-sm-4">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option value="">Selecione</option>
                  <option Value="A">Em Análise</option>
                  <option Value="C">Cancelado</option>
                  <option Value="S">Em Andamento</option>
                </select>
              </div>
              <div class="form-group col-sm-12">
                <label for="inputDescription">Descrição do Projeto</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
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
                    <input type="text" id="inputClientCompany" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Responsável pelo projeto</label>
                    <input type="text" id="inputProjectLeader" class="form-control" value="">
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