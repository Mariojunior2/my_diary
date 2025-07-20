<?php 
session_start();
require '../includes/conexao.php';

if($_GET) {
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $stmt->execute([
        ':email' => $email,
    ]);

    $usuario = $stmt->fetch();
 
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id_user'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

        header('Location: ../views/hub.php?sucesso=1');
        exit();
    }  else {
        header('Location: ../views/index.php?erro=1');
        exit();
    }

}

?>