<?php
// VERSÃO COM FORM DE PESQUISA

    require_once 'config.php';

    // Captura o valor digitado
    $pesquisa = $_GET['pesquisa'] ?? '';

    if ($pesquisa != ""){
        $sql = "SELECT * FROM produtos 
                WHERE nome LIKE '%$pesquisa%'";
    } else{
        $sql = "SELECT * FROM produtos";
    }

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

    <!-- FORM DE PESQUISA -->
    <form method="GET">
        <input 
            type="text" 
            name="pesquisa" 
            placeholder="Pesquisar produto"
            value="<?= $pesquisa ?>"
        >

        <button type="submit">Pesquisar</button>
    </form>
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