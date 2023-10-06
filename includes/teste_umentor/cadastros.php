<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Cadastros</h3>
        <div class="card-tools">
            <button type="button" data-toggle="modal" data-target="#modaledicao" onclick="novocadastro();" class="btn btn-tool" data-card-widget="Criar Novo" title="Novo Registro">
                <i class="fas fa-plus"></i> Novo Registro
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Minimizar">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Fechar">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-2" id="mostratabela">
    </div>
    <!-- /.card-body -->
</div>
</div>
<div id="mensagem"></div>
<script>
    listacadastros();
</script>