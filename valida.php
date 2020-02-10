<?php
session_start();

include_once("./sql/config.php");

require_once "recaptchalib.php";

$secret = "6Lft4NYUAAAAAAdp0786UuSEUyzswKT82NP-GEvE";

$response = null;
$reCaptcha = new ReCaptcha($secret);

if ($_SESSION['meu_erro'] >= 5) {
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
    }
}

if ((isset($_POST['login'])) && (isset($_POST['senha']))) {
    $usuario = mysqli_real_escape_string($conn, $_POST['login']); 
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $result_usuario = "SELECT * FROM usuario WHERE login = '$usuario' && senha = '$senha' LIMIT 1";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);

    if (isset($resultado)) {
        if ($_SESSION['meu_erro'] >= 5) {
            if ($response != null && $response->success) {
                $_SESSION['meu_erro'] = 0;
                $_SESSION['usuarioId'] = $resultado['id'];
                $_SESSION['usuarioNome'] = $resultado['nome'];
                $_SESSION['usuarioLogin'] = $resultado['login'];
                if ($_SESSION['usuarioNome'] == $resultado['nome']) {
                    header("Location: index.php");
                } else {
                    header("Location: signin.php");
                }
            } else {
                $_SESSION['loginErro'] = "Preencha o reCAPTCHA";
                header("Location: signin.php");
            }
        } else {
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioLogin'] = $resultado['login'];
            if ($_SESSION['usuarioNome'] == $resultado['nome']) {
                header("Location: index.php");
            } else {
                header("Location: signin.php");
            }
        }
    } else {
        $_SESSION['meu_erro']++;
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: signin.php");
    }
} else {
    $_SESSION['meu_erro']++;
    $_SESSION['loginErro'] = "Usuário ou senha inválida";
    header("Location: signin.php");
}
