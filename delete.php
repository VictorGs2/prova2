<?php
session_start();
include("./sql/config.php");

$id = $_GET["id"];

$delete = $conn->prepare("DELETE  FROM cliente WHERE id='$id'");
$delete->execute();

if($delete):
    header('Location: clientes.php');
endif;

?>