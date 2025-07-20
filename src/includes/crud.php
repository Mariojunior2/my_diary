<?php 
include 'conexao.php';

function listar_diarios($id_user) {
    global $pdo;
    $sql = "SELECT * FROM diario WHERE id_user = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscar_diario($id_diario, $id_user) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM diario WHERE id = :id AND id_user = :user_id");
    $stmt->execute([
        ':id' => $id_diario,
        ':user_id' => $id_user,
    ]);
    $diario =  $stmt->fetch(PDO::FETCH_ASSOC);
    return $diario;

    if(!$diario) {
        echo "Diário não encontrado ou acesso negado.";
        exit();
    }
}

function editar_diario($id, $titulo, $descricao, $conteudo) {
    global $pdo;

    $stmt = $pdo->prepare("UPDATE diario SET titulo = :titulo, descricao = :descricao, conteudo = :conteudo WHERE id = :id AND id_user = :user_id");
    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':conteudo' => $conteudo,
        ':id' => $id,
        ':user_id' => $_SESSION['usuario_id']
    ]);
}

function criar_diario($titulo, $descricao, $datetime, $id_user, $conteudo) {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO diario (titulo, descricao, dt_criacao, id_user, conteudo) VALUES (:titulo, :descricao, :dt_criacao, :id_user, :conteudo)");
    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':dt_criacao' => $datetime,
        ':id_user' => $id_user,
        ':conteudo' => $conteudo,
    ]);
}

function excluir_diario($id_diario, $id_user) {
    global $pdo;

    $stmt = $pdo->prepare("DELETE FROM diario WHERE id = :id AND id_user = :id_user");
    $stmt->execute([
        ':id' => $id_diario,
        ':id_user' => $id_user
    ]);
}

?>