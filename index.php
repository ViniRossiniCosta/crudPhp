<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - cadastrar</title>
</head>

<body>
    <h1>Cadastrar Usuario</h1>

    <?php 
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
    ?>

    <form method="POST" action="processa.php">
        <label for="">Nome: </label>
        <input type="text" name="" id="" placeholder=" digite seu nome">
        <br>
        <label for="">E-mail: </label>
        <input type="email" name="" id="" placeholder=" digite seu email">
        <br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>