<?php 
session_start();
include '../includes/header.php';
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
?>

<h1>Bem vindo, <?php echo "" . $_SESSION['usuario_nome'] ?></h1>
<a href="../functions/logout_process.php">Sair</a>

<?php include '../includes/footer.php'?>