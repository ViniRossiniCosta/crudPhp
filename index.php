<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>CRUD - Cadastrar</title>
</head>

<body>
    <a href="index.php">Cadastrar</a><br>
    <a href="listar.php">Listar</a><br>
    <h1>Cadastrar Usuário</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="processa_cad.php">
        
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Digite o seu Senha"><br><br>

        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Digite o seu Senha"><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>