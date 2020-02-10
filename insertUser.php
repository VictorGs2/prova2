<?php
include("./sql/config.php");

$query = "INSERT INTO usuario (nome, login, senha) VALUES ('$_POST[nome]', '$_POST[login]', '$_POST[senha]')";

if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
}

if ($query) :
    header('Location: usuarios.php');
endif;