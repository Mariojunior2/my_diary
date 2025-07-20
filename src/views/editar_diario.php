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


$diario = buscar_diario($id_diario, $id_user);

if($_POST) {
    editar_diario($id_diario, $_POST['titulo'], $_POST['descricao'], $_POST['conteudo']);
    header('Location: hub.php');
    exit();
}
?>

<h2>Editar Diário</h2>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $diario['id']; ?>">

    <label>Titulo:</label><br>
    <input type="text" name="titulo" value="<?php echo $diario['titulo']; ?>" id="titulo" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao" id="descricao" rows="4" required><?php echo htmlspecialchars($diario['descricao']) ?></textarea><br><br>

    <label>Conteudo:</label><br>
    <textarea name="conteudo" id="conteudo" rows="100" ><?php echo htmlspecialchars($diario['conteudo']) ?></textarea><br><br>
    <button type="submit">Salvar Alterações</button>
</form>

<a href="hub.php">Voltar</a>

<?php include '../includes/footer.php'?>