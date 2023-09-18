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
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        echo $_SESSION['msg'];
    }

    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    $qnt_result_pg = 2;

    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $result_usuario = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
        echo "ID: " . $row_usuario['id'] . "<br>";
        echo "Nome: " . $row_usuario['nome'] . "<br>";
        echo "E-mail: " . $row_usuario['email'] . "<br>";
    }

    $result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
    $resultado_pg = mysqli_query($conn, $resultado_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    echo $row_pg['num_result'];

    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    $max_links = 2;

    echo "<a href='listar.php?pagina=1'> Primeira </a>";

    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
        if($pag_ant >= 1) {
            echo "<a herf='listar.php?pagina=$pag_ant'> $pag_ant</a>";
        }
    }

    echo "$pagina";

    echo "<a href='listar.php?pagina=$quantidade_pg'> Ultima </a>";

    for($pag_dps = $pagina + 1; $pag_dps <= $pagina + $max_links; $pag_dps ++) {
        if($pag_dps <= $quantidade_pg){
            echo "<a herf='listar.php?pagina=$pag_dps'>$pag_dps</a>";
        }
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