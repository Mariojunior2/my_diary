<?php 
session_start();
include '../includes/header.php';
include '../includes/crud.php';
$dataAtual = date('Y-m-d H:i:s');
$id_user = $_SESSION['usuario_id'];

if (!isset($id_user)) {
    header('Location: index.php');
    exit();
}


if($_POST) {
    criar_diario($_POST['titulo'], $_POST['descricao'], $dataAtual, $id_user, $_POST['conteudo']);
    header('Location: hub.php');
    exit();
}
?>
<h2>Criar um Diário</h2>
<form method="post">
    <label>Titulo:</label><br>
    <input type="text" name="titulo" id="titulo" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao" id="descricao" rows="4" required></textarea><br><br>

    <label>Conteudo:</label><br>
    <textarea name="conteudo" id="conteudo" rows="100" required></textarea><br><br>
    <button type="submit">Enviar</button>
</form>

<a href="hub.php">Voltar</a>
<?php include '../includes/footer.php'?>