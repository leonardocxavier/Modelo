<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 


  $linha = '';

  $sqlcads = "SELECT * FROM `cadastros`";
  $res = $con->query($sqlcads);
  
  if ($res->rowCount() > 0) {
	  while ($dados = $res->fetch()) {
		  $linha .= '<tr>
					  <td>'. $dados['id'].'</td>
					  <td>'. $dados['nome'].'</td> 
					  <td>'. $dados['email'].'</td> 
					  <td>'. $dados['dataadm'].'</td> 
					  <td>'. $dados['datahcad'].'</td> 
					  <td>'. $dados['datahupdt'].'</td>
					  <td>
						  <a href="javascript:;" data-toggle="modal" data-target="#modaledicao" onclick="editarcadastro(' . "'" . $dados["id"] . "'" . ');"><span class="fa fa-edit" title="Editar Cadastro"></span></a>
						  | <a href="javascript:;" onclick="removercadastro(' . "'" . $dados["id"] . "'" . ');"><span class="fa fa-trash" title="Remover Cadastro"></span></a>
					  </td>
				  </tr>';
	  }
  } else {
	  $linha = '<tr><td colspan="7" class="text-center">Nenhum registro encontrado</td></tr>';
  }
?>


        <table class="table table-head-fixed text-nowrap">
             <thead>
                  <tr>
                  	<th>ID</th>
                  	<th>Nome</th>
                  	<th>E-Mail</th>
                  	<th>DATA DE ADMISSAO</th>
                  	<th>DATA E HORA (Cadastro)</th>
			      	<th>DATA E HORA (Atualização)</th>
				  	<th>AÇÕES</th>
                  </tr>
             </thead>
             <tbody>
                 <?php
				    echo $linha;
				 ?>
             </tbody>
        </table>
