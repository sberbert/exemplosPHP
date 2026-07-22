<?php
session_start(); // Inicia a sessão
require "config.php"; // Conexão com o banco de dados

$mensagem = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $senha = $_POST["senha"]; //pode conter espaços, não é necessário trim

    if ($email == "" || $senha == "") {
        $mensagem = "⚠ Preencha todos os campos.";

    } else {
        // Procura o usuário pelo e-mail
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se encontrou o usuário
        if ($usuario) {
            // Verifica a senha
            if (password_verify($senha, $usuario["senha"])) {
                // Cria a sessão
                $_SESSION["id"] = $usuario["id"];
                $_SESSION["nome"] = $usuario["nome"];
                $_SESSION["email"] = $usuario["email"];
                $_SESSION["perfil"] = $usuario["perfil"];
                header("Location: produtos/listar.php");
                exit();
            } else {
                $mensagem = "E-mail ou senha inválidos.";
            }

        } else {
            $mensagem = "⚠ E-mail ou senha inválidos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
<h2>👨‍💼 Login do Sistema</h2>
<hr>

<form method="POST">
    📧E-mail<br>
    <input type="email" name="email">
    <br><br>

    🔐Senha<br>
    <input type="password" name="senha">
    <br><br>

    <button>✅Entrar</button>
</form>

<hr>
<span style="color:red">
    <?= $mensagem ?>
</span>

</body>
</html>