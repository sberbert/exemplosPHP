<?php

require "../autenticacao.php"; // Verifica se o usuário está autenticado
require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página

require '../config.php';

$sql = "SELECT * FROM usuarios ORDER BY nome";

$stmt = $conn->query($sql);

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>    
      <title>Usuários Cadastrados</title>
      <style >
          .mensagem {
              background-color: #d4edda;
              color: #155724;
              padding: 10px;
              border: 1px solid #c3e6cb;
              margin-bottom: 15px;
          } 
      </style>
  </head>
  <body>

    <div style="float:right">
        <a href="../produtos/listar.php">🏠 Início</a>
    </div>

    <h2>👨‍💼Usuários Cadastrados</h2>
    <hr>

    <table border="1" cellpadding="5">
    <tr>

        <th>Nome</th>
        <th>E-mail</th>
        <th>Perfil</th>
        <th>Ações</th>
    </tr>

    <?php foreach($usuarios as $usuario){ ?>
    <tr>
        <td><?= htmlspecialchars($usuario["nome"]) ?></td>
        <td><?= htmlspecialchars($usuario["email"]) ?></td>
        <td><?= $usuario["perfil"] ?></td>
        <td>
            <a href="editar.php?id=<?= $usuario["id"] ?>">✏️</a>
            |
            <a href="excluir.php?id=<?= $usuario["id"] ?>" onclick="return confirm('Excluir usuário?')">🗑️</a>
        </td>
    </tr>
    <?php } ?>
    </table>

    <hr>
    <a href="cadastrar.php">➕ Novo Usuário</a><br><br>
  </body>   
</html>