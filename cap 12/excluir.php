<?php
    include "config.php";

    // Recebe ID
    $id = $_GET['id'];

    // Exclui produto
    $sql = "DELETE FROM produtos WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

    // Redireciona
    header("Location: listar.php?excluido=1");
    exit;
?>