<?php 
session_start();
include '../includes/header.php';
include '../includes/crud.php';
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$id_user = $_SESSION['usuario_id'];
$diarios = listar_diarios($id_user);
?>

<h3>Bem vindo, <?php echo "" . $_SESSION['usuario_nome'] ?></h3>

    <div class="container">
        <?php if (count($diarios) > 0): ?>
            <?php foreach ($diarios as $diario): ?>
                <div class="class">
                    <h4><?php echo htmlspecialchars($diario['titulo']); ?></h4>
                    <h5><?php echo htmlspecialchars($diario['descricao']); ?></h5>
                    <p><?php echo htmlspecialchars(mb_strimwidth($diario['conteudo'], 0, 50, '...')) ?></</p><br>
                    <small><?php echo htmlspecialchars($diario['dt_criacao']); ?></small><br>

                    <a href="editar_diario.php?id=<?php echo $diario['id']; ?>">Editar</a><br>
                    <a href="excluir_diario.php?id=<?php echo $diario['id']; ?>">Excluir</a><br>

                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <p>Você não tem nenhum diário.</p>
            <?php endif ?>
    </div>

<a href="criar_diario.php">Criar um  Diário</a><br>
<a href="../functions/logout_process.php">Sair</a>
<?php 
if(isset($_GET['atualizado']) && $_GET['atualizado'] == 1) {
    echo '<p style="color: green;">Diário atualizado com sucesso!</p>';
}
?>

<?php include '../includes/footer.php'?>