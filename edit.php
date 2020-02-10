<?php
include("./sql/config.php");

$id = filter_input(INPUT_GET, "id");
$nome = filter_input(INPUT_GET, "nome");
$email = filter_input(INPUT_GET, "email");
$cpf = filter_input(INPUT_GET, "cpf");
$cep = filter_input(INPUT_GET, "cep");
$cidade = filter_input(INPUT_GET, "cidade");
$endereco = filter_input(INPUT_GET, "endereco");
$numero = filter_input(INPUT_GET, "numero");
$bairro = filter_input(INPUT_GET, "bairro");
$uf = filter_input(INPUT_GET, "uf");
$telefone = filter_input(INPUT_GET, "telefone");
$sitee = filter_input(INPUT_GET, "sitee");


if($conn) {
    $query = mysqli_query($conn, "update cliente set nome='$nome', email='$email', cpf='$cpf', cep='$cep', cidade='$cidade', endereco='$endereco', numero='$numero', bairro='$bairro', uf='$uf', telefone='$telefone', sitee='$sitee' where id='$id';");
    if($query) {
        header("Location: clientes.php");
    } else {
        die("Erro: " . mysqli_error($conn));
    }
} else {
    die("Erro: " . mysqli_error($conn));
}
