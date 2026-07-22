<?php

    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página

    require '../config.php';

// Recebe o ID
$id = $_GET["id"];

// Impede que o administrador exclua seu próprio usuário
if ($id == $_SESSION["id"]) {
    die("Você não pode excluir seu próprio usuário.");
}

// Verifica se o usuário existe
$sql = "SELECT * FROM usuarios WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Usuário não encontrado.");
}

// Exclui
$sql = "DELETE FROM usuarios WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: listar.php");
exit();
?>