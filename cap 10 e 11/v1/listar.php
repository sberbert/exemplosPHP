<?php
  require_once 'config.php';
  $sql = "SELECT * FROM produtos";
  $resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
  <head>
      <title>Produtos Cadastrados</title>
  </head>
  <body>

    <h2>📝Produtos Cadastrados</h2>
    <hr>

    <table border="1" cellspacing="0" cellpadding="5">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
      </tr>

      <?php while ($linha = $resultado->fetch_assoc()) : ?>
        <tr>
          <td><?= $linha['id'] ?></td>
          <td><?= $linha['nome'] ?></td>
          <td>R$ <?= $linha['preco'] ?></td>
          <td><?= $linha['quantidade'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>

    <hr>
    <a href="index.php">➕ Novo Cadastro</a>
  </body>
</html>