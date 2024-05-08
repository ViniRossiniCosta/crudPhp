<?php

session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+NEk3OBfT9n8C/KCkKc4fGg4JbEL5qO8Xf9dwW3" crossorigin="anonymous">

    <meta charset="utf-8">
    <title>CRUD - Editar</title>
</head>

<body>
    <a href="index.php">Cadastrar</a><br>
    <a href="listar.php">Listar</a><br>
    <h1>Editar Usuário</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="processa_edit.php">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
        
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="" value="<?php echo $row_usuario['email']; ?>"><br><br>
        
        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Digite o seu melhor Senha" value="<?php echo $row_usuario['senha']; ?>"><br><br>

        <input type="submit" value="Editar">
    </form>
</body>

</html>