<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST["senha"];    
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    echo "<hr>";
    echo "Hash da senha digitada (copie e cole no campo senha do BD): $senhaHash";
    echo "<hr>";    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
<h2>Geração de Hash de Senha</h2>
    <form method="post">
        Senha<br>
        <input type="text" name="senha">
        <br><br>
        <button>Gerar Hash</button>
    </form>
</body>
</html>