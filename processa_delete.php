<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    // Preparação da declaração SQL
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Verifica se a exclusão foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado</p>";
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi apagado</p>";
    }
    $stmt->close();
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
}

// Redireciona de volta para a página listar.php
header("Location: listar.php");
exit();
