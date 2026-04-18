<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Produtos</title>
</head>
<body>
  <h1>Cadastro de Produtos</h1>

  <form method="post">
    Produto:<br>
    <input type="text" name="produto">
    <br><br>
    Quantidade:<br><input type="number" name="quantidade"><br>
    <br>
    <button>Enviar</button>
  </form>

  <hr>
</body>
</html>

<?php
  if (isset($_REQUEST['produto'])) {
    
    $produto = $_REQUEST['produto'];
    $quantidade = $_REQUEST['quantidade'];

    if (empty($produto) || empty($quantidade)) {
      echo "Preencha todos os campos";
    } else {
      echo "Produto: $produto";
      echo "<br>";
      echo "Quantidade: $quantidade";
    }

  }
?>
