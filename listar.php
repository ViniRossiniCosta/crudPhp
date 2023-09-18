<?php 
    session_start();
    include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Lista de usuarios</title>
</head>

<body>
    <h1>Lista de usuarios</h1>

    <?php 
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            echo $_SESSION['msg'];
        }

        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

        $pagina = (!empty($pagina_atual)) ? $pagina_atual: 1;

        $result_usuario = "SELECT * FROM usuarios";
        $resultado_usuario = mysqli_query($conn,$result_usuario);
        while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
            echo "ID: " . $row_usuario['id'] . "<br>";
            echo "Nome: " . $row_usuario['nome'] . "<br>";
            echo "E-mail: " . $row_usuario['email'] . "<br>";
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