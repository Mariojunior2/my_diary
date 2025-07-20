<?php 
session_start();
include '../includes/header.php'

?>
<h2>Registro</h2>
<form action="../functions/registro_process.php" method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" id="nome" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label>Senha:</label>
    <input type="password" name="senha" id="senha" required>
    <br>
    <button type="submit">Registrar</button>
    <a href="./index.php">Já tem conta clique aqui!</a>


</form>
<?php 
    if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1)     {
        echo '<p style="color: green;">Cadastro realizado com sucesso!</p>';
    }
    if (isset($_GET['erro']) && $_GET['erro'] == 1) {
        echo '<p style="color: red;">Erro ao cadastrar. Tente novamente.</p>';
    }
    ?>

<?php include '../includes/footer.php'?>