<?php
session_start();
require '../includes/conexao.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $verifica = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $verifica->execute([':email' => $email]);

    if ($verifica->rowCount() > 0) {
        header('Location: ../views/registro.php?erro=1');
        exit();
    } else {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare('INSERT INTO user (nome, email, senha)  VALUES (:nome, :email, :senha)');

            $executando = $stmt->execute([
                ':nome' =>  $nome,
                ':senha' => $senhaHash,
                ':email' => $email,
            ]);

            if ($executando) {
                header('Location: ../views/registro.php?sucesso=1');
                exit();
            } 
        } catch (PDOException $e) {
            header('Location: ../views/registro.php?erro=1');
            exit();
        }
    }
}
