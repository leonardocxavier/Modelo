<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 
  header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
?> 

<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<div class="position-relative p-3 bg-gray">
  <div class="ribbon-wrapper ribbon-xl">
    <div class="ribbon bg-warning text-lg">Primeiro Acesso</div>
  </div>
  <div class="card-body">
    <h4>Para iniciarmos precisamos de apenas alguns dados:</h4>
    <div class="row">
      <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Empresa</a>
        </div>
      </div>
      <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
          <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
            <div class="row">
              <div class="form-group col-sm-4">
                <label>Nome Fantazia</label>
                <input type="text" id="nfant" class="form-control" placeholder="Nome empresa">
              </div>
              <div class="form-group col-sm-4">
                <label>Razão Social</label>
                <input type="text" id="nsoc" class="form-control" placeholder="Razão Social">
              </div>
              <div class="form-group col-sm-4">
                <label>CNPJ</label>
                <input type="text" id="cnpj" class="form-control" onblur="validarCNPJ(this.value)" placeholder="000.000.000/0000-00">
              </div>
              <div class="form-group col-sm-4">
                <label>Telefone</label>
                <input type="text" id="telef" class="form-control" placeholder="0 0000-0000">
              </div>
              <div class="form-group col-sm-4">
                <label>Celular(WatZapp)</label>
                <input type="text" id="cel" class="form-control" placeholder="0 0000-0000">
              </div>
              <div class="form-group col-sm-4">
                <label>E-Mail</label>
                <input type="text" id="mail" class="form-control" placeholder="alguem@algumacoisa.com">
              </div>
              <div class="form-group col-sm-4">
                <label>Aceita Receber E-mail's?</label>
                <div class="icheck-success d-inline">
                  <input type="checkbox" checked="" id="Receive_mail">
                  <label for="Receive_mail">
                  </label>
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label>Aceita Receber Ligação Telefônica?</label>
                <div class="icheck-success d-inline">
                  <input type="checkbox" checked="" id="Tel_contact">
                  <label for="Tel_contact">
                  </label>
                </div>
              </div>
              <div class="form-group col-sm-4">
                <label>Aceita Receber Mensagens Watzapp?</label>
                <div class="icheck-success d-inline">
                  <input type="checkbox" checked="" id="Wpp_acept">
                  <label for="Wpp_acept">
                  </label>
                </div>
              </div>
              <div class="form-group col-sm-1"></div>
              <div class="form-group col-sm-10">
                <button class="btn btn-info btn-block" onclick="gravadados_first_time();">Acessar o sistema!</button>
              </div>
              <div class="form-group col-sm-1"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="message"></div>
