<?php 
session_start();
include_once("conexao.php");

// Verifica se os campos obrigatórios estão preenchidos
if (empty($_POST['email']) || empty($_POST['senha'])) {
    $_SESSION['msg'] = "<p style='color:red;'>Por favor, preencha todos os campos.</p>";
    header("Location: index.php");
    exit();
}

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

// Preparação da declaração SQL
$stmt = $conn->prepare("INSERT INTO usuarios (email, senha, created) VALUES (?, ?, NOW())");
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();

// Verifica se a inserção foi bem-sucedida
if ($stmt->affected_rows > 0) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
    header("Location: listar.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não cadastrado</p>";
    header("Location: index.php");
}
$stmt->close();
