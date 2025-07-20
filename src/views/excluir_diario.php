<?php 
session_start();
include '../includes/header.php';
include '../includes/crud.php';
$id_user = $_SESSION['usuario_id'];

if (!isset($id_user)) {
    header('Location: index.php');
    exit();
}
if(!isset($_GET['id'])) {
    echo "ID incorreto";
    exit();
}

$id_diario = $_GET['id'];

excluir_diario($id_diario, $id_user);
header('Location: hub.php');
exit();

?>