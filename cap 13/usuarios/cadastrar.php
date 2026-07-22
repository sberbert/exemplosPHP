<?php
    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página

    require '../config.php';

$mensagem = "";

$nome = "";
$email = "";
$perfil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];
    $perfil = $_POST["perfil"];

    // Validações
    if ($nome == "" || $email == "" || $senha == "" || $perfil == "") {
        $mensagem = "Preencha todos os campos.";

    } else {
        // Gera o hash da senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha, perfil)
                VALUES (:nome, :email, :senha, :perfil)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->bindParam(':perfil', $perfil);   

        try {
            $stmt->execute();
            $mensagem = "Usuário cadastrado com sucesso!";

            // Limpa formulário
            $nome = "";
            $email = "";
            $perfil = "";

        } catch (PDOException $e) {
            $mensagem = "Erro ao cadastrar usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>

<body>

<h2>➕ Cadastro de Usuário</h2>
<hr>    

<form method="POST">
    Nome<br>
    <input type="text" name="nome" value="<?=$nome?>">
    <br><br>

    E-mail<br>
    <input type="email" name="email" value="<?=$email?>">
    <br><br>

    Senha<br>
    <input type="password" name="senha">
    <br><br>

    Perfil<br>
    <select name="perfil">
        <option value="">Selecione...</option>
        <option value="ADM">Administrador</option>
        <option value="FUNC">Funcionário</option>
    </select>
    <br><br>

    <button>✅ Cadastrar</button>
</form>
<br>
<?= $mensagem ?>

<hr>
<a href="listar.php">🔎 Ver usuários cadastrados</a>

</body>
</html>