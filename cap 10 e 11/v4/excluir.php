<?php
    include "config.php";

    // Recebe ID
    $id = $_GET['id'];

    // Exclui produto
    $sql = "DELETE FROM produtos WHERE id = $id";

    $conn->query($sql);

    // Redireciona
    header("Location: listar.php");
    exit;
?>