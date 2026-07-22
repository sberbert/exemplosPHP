<?php
    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página
        
    require "../config.php";

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