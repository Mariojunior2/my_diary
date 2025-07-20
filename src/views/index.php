<?php 
session_start();
include '../includes/header.php'

?>
<h2>Login</h2>
<form action="../functions/login_process.php" method="GET">
    <label>Email:</label>
    <input type="text" name="email" id="email" required>
    <br>
    <label>Senha:</label>
    <input type="password" name="senha" id="senha" required>
    <br>
    <button type="submit">Entrar</button>
    <a href="./registro.php">Ainda sem conta clique aqui!</a>
    <?php 
    if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
        echo '<p style="color: green;">Login realizado com sucesso!</p>';
    }

    if(isset($_GET['erro']) && $_GET['erro'] == 1) {
        echo '<p style="color: red;">E-mail ou senha incorretos.</p>';
    }
    ?>
</form>

<?php 
include '../includes/footer.php'
?>