<?php
    session_start();
?>
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {         
            $produto = $_POST['produto'];
            $quantidade = $_POST['quantidade'];

            if (empty($produto) || empty($quantidade)) {
                echo "Preencha todos os campos";
            } else {

              echo "Produto: $produto";
              echo "<br>";
              echo "Quantidade: $quantidade";

              $_SESSION['produto'] = $produto;
              $_SESSION['quantidade'] = $quantidade;

              echo "<br><br>";
              echo "<a href='resumo-v2.php'>Resumo para impressão</a>";

              //header("Location: resumo-v2.php");
              exit;
            }
        }       
?>