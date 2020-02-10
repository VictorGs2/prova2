<?php
include("./sql/config.php");

$query = "INSERT INTO cliente (nome, endereco, numero, bairro, cidade, uf, cep, email, cpf, telefone, sitee) VALUES ('$_POST[nome]', '$_POST[endereco]', '$_POST[numero]', '$_POST[bairro]', '$_POST[cidade]', '$_POST[uf]', '$_POST[cep]', '$_POST[email]', '$_POST[cpf]', '$_POST[telefone]', '$_POST[sitee]')";

if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
}

if ($query) :
    header('Location: clientes.php');
endif;
