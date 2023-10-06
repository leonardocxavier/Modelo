<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  //variavel recebida do ajax
  /*
        idcad : id
  */

  $id = filter_input(INPUT_POST,'idcad');

  $sqlcad="SELECT *FROM `cadastros` WHERE `id`='$id'";
  $resp=$con->query($sqlcad);

  $dados=$resp->fetch();

?>

<div class="modal-header">
   <h4 class="modal-title">Novo Cadastro</h4>
   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">×</span>
   </button>
</div>
<div class="modal-body">
	<div class="form-group col-md-12">
        <label for="nome">Nome</label>
        <input type="text" id="nome" value="<?php echo $dados['nome'];?>" class="form-control" value="">
    </div>
	<div class="form-group col-md-12">
		<div class="row">
			<div class="form-group col-md-9">
        		<label for="mail">E-Mail</label>
        		<input type="text" id="mail" value="<?php echo $dados['email'];?>" class="form-control" value="">
    		</div>
			<div class="form-group col-md-3">
        		<label for="datead">Data Admissão</label>
        		<input type="date" id="datead" value="<?php echo $dados['dataadm'];?>" class="form-control" value="">
    		</div>
		</div>
	</div>	
</div>
<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-primary" onclick="gravareditacadastro('<?php echo $id;  ?>');">Gravar Dados</button>
</div>


