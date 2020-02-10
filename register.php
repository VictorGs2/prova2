<?php
include("./sql/config.php");
session_start();

if ((!isset($_SESSION['usuarioLogin']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuarioLogin']);
    unset($_SESSION['senha']);
    header('location:erro.php');
}
$logado = $_SESSION['usuarioNome'];
$tipo = filter_input(INPUT_GET, "tipo");

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Script jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="./js/viacep.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>
<script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    $("#cpf").mask("000.000.000-00");
    $("#cep").mask("00000-000");
</script>

<body>
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
                                <a href="./index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($tipo == "cliente") { ?>
                                    <a href="./clientes.php" class="nav-link active">
                                    <?php } ?>
                                    <?php if ($tipo == "user") { ?>
                                        <a href="./clientes.php" class="nav-link">
                                        <?php } ?>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Clientes</p>
                                        </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($tipo == "user") { ?>
                                    <a href="./usuarios.php" class="nav-link active">
                                    <?php } ?>
                                    <?php if ($tipo == "cliente") { ?>
                                        <a href="./usuarios.php" class="nav-link">
                                        <?php } ?>
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


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <form class="formRegister" action="" method="post">
            <?php if ($tipo == "cliente") { ?>
                <h1 class="h1">Cadastro de Clientes</h1>
            <?php } ?>
            <?php if ($tipo == "user") { ?>
                <h1 class="h1">Cadastro de Usuários</h1>
            <?php } ?>
            <div class="row">
                <div class="col" id="col1">
                    <?php if ($tipo == "user" or $tipo == "cliente") { ?>
                        <input class="form-control" id="exampleInputEmail1" type="text" name="id" id="id" value="ID" readonly>
                        <input class="form-control" type="text" name="nome" placeholder="Nome" required>
                    <?php } ?>
                    <?php if ($tipo == "cliente") { ?>
                        <input class="form-control" type="email" name="email" placeholder="E-mail">
                        <input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" minlength="14" required>
                        <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone">
                        <input class="form-control" type="text" name="sitee" id="sitee" placeholder="Site">
                    <?php } ?>
                </div>
                <div class="col" id="col2">
                    <?php if ($tipo == "cliente") { ?>
                        <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP" maxlength="9" onblur="pesquisacep(this.value);">
                        <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade">
                        <input class="form-control" type="text" name="endereco" id="rua" placeholder="Endereço">
                        <input class="form-control" type="text" name="numero" placeholder="Número">
                        <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro">
                        <input class="form-control" type="text" name="uf" id="uf" placeholder="UF" size="2">
                    <?php } ?>
                    <?php if ($tipo == "user") { ?>
                        <input class="form-control" type="text" name="login" id="login" placeholder="Login" required>
                        <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required>
                    <?php } ?>
                </div>
            </div>
            <?php if ($tipo == "cliente") { ?>
                <input formaction="insert.php" class="form-control btn sidebar-dark-primary btn-register" type="submit" value="Confirmar">
            <?php } ?>
            <?php if ($tipo == "user") { ?>
                <input formaction="insertUser.php" class="form-control btn sidebar-dark-primary btn-register" type="submit" value="Confirmar">
            <?php } ?>

        </form>
    </main>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>