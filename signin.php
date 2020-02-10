<?php
session_start();
include("./sql/config.php");
$_SESSION['meu_erro'];


$query = "SELECT id FROM cliente";
$queryUser = "SELECT id FROM usuario";

$result = mysqli_query($conn, $query);
$resultUser = mysqli_query($conn, $queryUser);

$rowcount = mysqli_num_rows($result); 
$rowcountUser = mysqli_num_rows($resultUser);

// define('SITE_KEY', '6Lft4NYUAAAAADFs_oj8KXXtlvp5vgBNZSyiedlW');
// define('SECRET_KEY', '6Lft4NYUAAAAAAdp0786UuSEUyzswKT82NP-GEvE');

?>
<!DOCTYPE html>
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
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,900&display=swap" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        
        <!-- Content Wrapper. Contains page content -->
        <div id="msg">Seja <br>Bem-vindo(a)!</div>
        <div class="container login-container">
            <div class="content">
                <div class="col-md-6 login-form-2">
                    <h3>Login</h3>
                    <form action="./valida.php" method="POST" id="formlogin" name="formlogin">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Seu Login" required autofocus><br>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Sua Senha" name="senha" id="senha" required><br>
                            <p class="status">
                                <?php
                                //Recuperando o valor da variável global, os erro de login.
                                if (isset($_SESSION['loginErro'])) {
                                    echo $_SESSION['loginErro'];
                                    unset($_SESSION['loginErro']);
                                } ?>
                            </p>
                            <p class="status">
                                <?php
                                //Recuperando o valor da variável global, deslogado com sucesso.
                                if (isset($_SESSION['logindeslogado'])) {
                                    echo $_SESSION['logindeslogado'];
                                    unset($_SESSION['logindeslogado']);
                                }
                                ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btnSubmit" value="Login">Acessar</button>
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                        </div>
                        <?php if ($_SESSION['meu_erro'] >= 5) { ?>
                            <div class="g-recaptcha" data-sitekey="6Lft4NYUAAAAADFs_oj8KXXtlvp5vgBNZSyiedlW"></div>
                        <?php } ?>
                    </form>
                </div>
            </div>
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