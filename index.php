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
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    // Recebe o num da pagina
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

    $paginao = (!empty($pagina_atual)) ? $pagina_atual : 1;

    // Set da qnt de paginas
    $qnt_pag = 2;

    // calcular o inicio da visualizacao
    $inicio = ($qnt_pag * $paginao) - $qnt_pag;

    $result_usuario = "SELECT * FROM ususarios LIMIT $inicio, $qnt_pag";
    $resultado_usuarios = mysql_query($conn, $result_usuario);

    while ($row_usuario = mysql_fetch_assoc($resultado_usuarios)) {
        echo "id: " . $row_usuario['id'] . "<br>";
        echo "nome: " . $row_usuario['nome'] . "<br>";
        echo "email: " . $row_usuario['email'] . "<br><hr>";
    }

    // paginacao - somar a qnt de usuarios
    $paginao_atual = "select count(id) as num_result FROM usuarios";
    mysql_query($conn, $pagina_atual);
    $row_pg = mysql_fetch_assoc($pagina_atual);

    // quantidade de paginas
    $qnt_pag_atual = ceil($row_pg['num_result'] / $qnt_pag);

    // Link herf antes e depois

    echo "<a herf='index.php?pagina=1'>Primeira</a>";
    
    for($pg_ant = $pagina_atual - $qnt_pag_atual; $pg_ant <= $pagina -1; $pg_ant ++) {
        if() {
            
        }
        echo "<a herf='index.php?pagina=$pg_ant'>$pg_ant</a>";
    }

    echo "$pagina";

    echo "<a herf='index.php?pagina =$qnt_pag_atual'>Ultima</a>";

    ?>
    <!-- CRUD - Create Client-Side -->
    <!-- <form method="post" action="CRUD.php">
        <label for="">Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo">
        <label for="">Email: </label>
        <input type="text" name="email" placeholder="Digite o seu Email">

        <input type="submit" name="" id="" value="Cadastrar">
    </form> -->
</body>

</html>