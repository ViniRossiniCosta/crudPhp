<?php 

session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$result_usuario = "INSERT INTO usuarios (nome, email, created) VALUES ('$nome', '$email', now())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style = 'color:green;'>Usuario cadastrado com sucesso</p>";
    header("Location: listar.php");
}else {
    $_SESSION['msg'] = "<p style = 'color: #7C0A02;'>Usuario não cadastrado</p>";
    header("Location: index.php");
}
?>
