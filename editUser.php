<?php
include("./sql/config.php");

$id = filter_input(INPUT_GET, "id");
$nome = filter_input(INPUT_GET, "nome");
$tipo = filter_input(INPUT_GET, "tipo");
$login = filter_input(INPUT_GET, "login");
$senha = filter_input(INPUT_GET, "senha");


if ($conn) {
    $query = mysqli_query($conn, "update usuario set nome='$nome', login='$login', senha='$senha' where id='$id';");
    if ($query) {
        header("Location: usuarios.php");
    } else {
        die("Erro: " . mysqli_error($conn));
    }
} else {
    die("Erro: " . mysqli_error($conn));
}
