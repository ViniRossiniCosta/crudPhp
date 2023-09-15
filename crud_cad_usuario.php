<?php 

session_start();
include_once('conexao.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// echo "nome: $nome <br>";
// echo "email: $email <br>";

$result_usuario = "insert into usuarios (nome, email, created) values ('$nome', $email, now())";
$result_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuario cadastrado com sucesso<\p>";
    header("location: index.php");
}else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuario não cadastrado<\p>";
    header("location: cad_usuario.php");
}

?>