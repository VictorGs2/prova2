<?php
include("./sql/config.php");
session_start();


if ((!isset($_SESSION['usuarioLogin']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['usuarioLogin']);
  unset($_SESSION['senha']);
  header('location:erro.php');
}
$logado = $_SESSION['usuarioLogin'];

$query = "SELECT id FROM cliente";
$queryUser = "SELECT id FROM usuario";

$result = mysqli_query($conn, $query);
$resultUser = mysqli_query($conn, $queryUser);

$rowcount = mysqli_num_rows($result);
$rowcountUser = mysqli_num_rows($resultUser);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Minha Empresa</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link href="dashboard.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand sidebar-dark-primary">
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <h6>
            <a id="botaoSair" href="sair.php">Sair</a>
          </h6>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <span class="brand-text font-weight-light"><?php
            echo "Olá " . $_SESSION['usuarioNome'];
            ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./clientes.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./usuarios.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Usuários</p>
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
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- Mostra o total de clientes/usarios -->
      <div class="content">
        <div class="container-fluid">
          <hr class="style-two">
          <main role="main" class="col-md-9 col-lg-10">
            <h1 class="h2">Total de clientes:
              <?php
              printf($rowcount);
              ?></h1>
            <h1 class="h2">Total de usuários:
              <?php
              printf($rowcountUser);
              ?></h1>
          </main>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Etapa 2
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="https://www.linkedin.com/in/josé-victor-goulart-dos-santos-378091169/">José V. Goulart </a>.</strong> Imagine, Create & Believe.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>