<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud-php</title>

</head>

<body>
    <a href="/index.php">Cadastrar</a>
    <a href="/listar.php">Listar</a>
    
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form method="post" action="CRUD.php">
        <label for="">Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo">
        <label for="">Email: </label>
        <input type="text" name="email" placeholder="Digite o seu Email">

        <input type="submit" name="" id="" value="Cadastrar">
    </form>
</body>

</html>