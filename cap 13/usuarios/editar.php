<?php

    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página

    require '../config.php';

// Recebe o ID enviado pela URL
$id = $_GET["id"];

// Busca o usuário
$sql = "SELECT * FROM usuarios WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Se não encontrar o usuário
if (!$usuario) {
    die("Usuário não encontrado.");
}

// Atualiza os dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $perfil = $_POST["perfil"];
    $senha = $_POST["senha"];

    if ($nome == "" || $email == "" || $perfil == "") {
        echo "<p>Preencha todos os campos obrigatórios.</p>";
    } else {
        // Se digitou uma nova senha
        if ($senha != "") {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "UPDATE usuarios
                    SET nome = :nome,
                        email = :email,
                        senha = :senha,
                        perfil = :perfil
                    WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senhaHash);
            $stmt->bindParam(':perfil', $perfil);

            $stmt->execute();

        } else {

            $sql = "UPDATE usuarios
                    SET nome = :nome,
                        email = :email,
                        perfil = :perfil
                    WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':perfil', $perfil);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        }

        header("Location: listar.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>

<body>
<h2>✏️Editar Usuário</h2>
<hr>

<form method="POST">
    Nome<br>
    <input type="text" name="nome" value="<?= htmlspecialchars($usuario["nome"]) ?>">
    <br><br>

    E-mail<br>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario["email"]) ?>">
    <br><br>

    Nova Senha<br>
    <input type="password" name="senha">
    <small>(Deixe em branco para manter a senha atual)</small>
    <br><br>

    Perfil<br>
    <select name="perfil">
        <option value="ADM"
            <?= $usuario["perfil"] == "ADM" ? "selected" : "" ?>>
            ADM
        </option>

        <option value="FUNC"
            <?= $usuario["perfil"] == "FUNC" ? "selected" : "" ?>>
            FUNC
        </option>
    </select>
    <br><br>

    <button>✅Salvar</button>

    <button type="button" onclick="window.location.href='listar.php'">❌Cancelar</button>
</form>

</body>
</html>