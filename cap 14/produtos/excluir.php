<?php
    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página    
    require "../config.php";

    // Recebe ID
    $id = $_GET['id'];

    // Busca a foto do produto
    $sql = "SELECT foto FROM produtos WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        die("Produto não encontrado.");
    }

    // Exclui a imagem
    if ($produto["foto"] != "" && file_exists("../uploads/" . $produto["foto"])) {
        unlink("../uploads/" . $produto["foto"]);
    }    

    // Exclui produto
    $sql = "DELETE FROM produtos WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

    // Redireciona
    header("Location: listar.php?excluido=1");
    exit;
?>