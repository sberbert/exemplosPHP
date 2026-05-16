<?php
  // VERSÃO COM EDICAO E EXCLUSAO e MSG DE SUCESSO 
  $sucesso = $_GET['sucesso'] ?? '';
  $excluido = $_GET['excluido'] ?? '';

    require_once 'config.php';

    // Recebendo filtros
    $nome = $_GET['nome'] ?? '';
    $precoMin = $_GET['precoMin'] ?? '';
    $quantidadeMin = $_GET['quantidadeMin'] ?? '';

    // SQL inicial
    $sql = "SELECT * FROM produtos WHERE 1=1";  

    // Filtro por nome
    if($nome != ""){
        $sql .= " AND nome LIKE '%$nome%'";
    }

    // Filtro por preço mínimo
    if($precoMin != ""){
        $sql .= " AND preco >= $precoMin";
    }

    // Filtro por quantidade mínima
    if($quantidadeMin != ""){
        $sql .= " AND quantidade >= $quantidadeMin";
    }    

    $resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
  <head>
      <title>Produtos Cadastrados</title>
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

    <h2>📝Produtos Cadastrados</h2>
    <hr>

    <?php if($sucesso == 1){ ?>

        <div class="mensagem">
            Produto cadastrado com sucesso!
        </div>

    <?php } ?>    

    <?php if($excluido == 1){ ?>

        <div class="mensagem">
            Produto excluído com sucesso!
        </div>

    <?php } ?>        

    <!-- FORM DE PESQUISA -->
    <form method="GET">
        <input
            type="text"
            name="nome"
            placeholder="Pesquisar nome"
            value="<?= $nome ?>"
        >

        <input
            type="number"
            step="0.01"
            name="precoMin"
            placeholder="Preço mínimo"
            value="<?= $precoMin ?>"
        >

        <input
            type="number"
            name="quantidadeMin"
            placeholder="Quantidade mínima"
            value="<?= $quantidadeMin ?>"
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
        <th>Edição</th>
        <th>Exclusão</th>
      </tr>

      <?php while ($linha = $resultado->fetch_assoc()) : ?>
        <tr>
          <td><?= $linha['id'] ?></td>
          <td><?= $linha['nome'] ?></td>
          <td>R$ <?= $linha['preco'] ?></td>
          <td><?= $linha['quantidade'] ?></td>
          <td align="center"><a href="editar.php?id=<?= $linha['id'] ?>">✏️</a></td>
          <td align="center"><a href="excluir.php?id=<?= $linha['id'] ?>">🗑️</a></td>
          <!--td align="center"><a href="excluir.php?id=<?= $linha['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')">🗑️</a></td-->          
        </tr>
      <?php endwhile; ?>
    </table>

    <hr>
    <a href="index.php">➕ Novo Cadastro</a>
  </body>
</html>