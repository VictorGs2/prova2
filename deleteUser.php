<?php
session_start();
include("./sql/config.php");

$id = $_GET["id"];

$deleteUser = $conn->prepare("DELETE  FROM usuario WHERE id='$id'");
$deleteUser->execute();

if ($deleteUser) :
    header('Location: usuarios.php');
endif;

?>
