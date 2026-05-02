<?php
require_once 'config.php';
$sql = "SELECT * FROM produtos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>
<h2>Produtos cadastrados</h2>
<table border="1">
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
<a href="index.php">Novo cadastro</a>
</body>
</html>