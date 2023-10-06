<?php
  include_once "../db/lock_index.php";
  include_once "../db/config.php";
  //foto do usuário:
  
  
  if(get_gravatar($_SESSION['emailusuario'])){
    $foto = get_gravatar($_SESSION['emailusuario']);
  }else{
    $foto = "../dist/img/user.jpg";
  }

  $idempresa='';

    if($_SESSION['idempresa']){
      $idempresa=$_SESSION['idempresa'];
    }else{
      $idempresa='0';
    }
    header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nat's | Note</title>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- SummerNote style -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Messages/alerts Style -->
  <link rel="stylesheet" href="../plugins/message/codebase/themes/message_skyblue.css">
  <!-- toastr Style -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="sidebar-mini dark-mode sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="javascript:;" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" onclick="logout();">
        <a href="javascript:;" class="nav-link">Sair</a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="javascript:;" class="nav-link">SAC</a>
      </li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="javascript:;" onclick="abrechat();" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
      <li class="nav-item">
        <div class="dropdown-item">
          <input type="checkbox" onchange="dark();" class="mt-2" id="buttondark" checked data-bootstrap-switch >  
        </div>
      </li>   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nat's Note</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $foto; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:;" class="d-block"><?php echo $_SESSION['nomeusuario']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="javascript:;" class="nav-link" onclick="dasboard();">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="javascript:;" class="nav-link" onclick="projetos();">
                  <i class="nav-icon fas fa-folder"></i>
                  <p>
                    Projetos
                  </p>
                </a>
          </li>
          <li class="nav-item">
            <a href="javascript:;" class="nav-link" onclick="abreanotacoes();">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Enciclopédia
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:;" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
               Cadastros
              </p>
            </a>
            <ul class="nav nav-treeview">
                  <li class="nav-item">
                <a href="javascript:;" class="nav-link" onclick="empresa();">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Empresa
                  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;" class="nav-link" onclick="usuarios();">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Usuários
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="p-3 content" id="apresenta">


    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>v.</b> <?php echo $version;?>
    </div>
    <strong>Copyright &copy; 2022 <a href="https://natsofficesolutions.com" target="_blank">Nat's Office Solutions</a>.</strong> All rights reserved # Developer: Leonardo Xavier #.
  </footer>
  <aside class="control-sidebar control-sidebar-dark" id="chat" style="width: 40%;">

  </aside>

</div>

<div class="modal fade" id="modaledicao" style="display: none;" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="janelacad">
      <div class="modal-header">
        <h4 class="modal-title">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- Messages/alerts -->
<script src="../plugins/message/codebase/message.js"></script>
<!-- SummerNote -->
<script src="../plugins/summernote/summernote-bs4.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- App -->
<script src="../includes/js/app.js"></script>

<script>
$(window).on('popstate', function() {
    $(".modal-backdrop").remove();
});
$( document ).ready(function() {
  let emp = '<?php echo  $idempresa;?>';
    if( emp==="0"){
      first_time();
    }
});
 
</script>
</body>
</html>
