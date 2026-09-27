<?php
    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página
    require '../config.php';

    //para mensagens    
    $erro = "";
    $sucesso = $_GET['sucesso'] ?? '';
    $excluido = $_GET['excluido'] ?? '';

    $nome = "";
    $preco = "";
    $quantidade = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nome = trim($_POST['nome']);
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

        // VALIDAÇÃO
        if (empty($nome)) {
            $erro .= "Nome obrigatório<br>";
        }

        if (empty($preco) || $preco <= 0) {
            $erro .= "Preço inválido<br>";
        }

        if (empty($quantidade) || $quantidade <= 0) {
            $erro .= "Quantidade inválida<br>";
        }

        // Verifica se foi enviada uma imagem
        if ($_FILES["foto"]["name"] != "") {
            // Pega a extensão do arquivo
            $extensao = pathinfo($_FILES["foto"]["name"],
                                 PATHINFO_EXTENSION
                                );
           
            // Gera um nome único
            $foto = uniqid() . "." . $extensao;
            
            // Move a imagem para a pasta uploads
            move_uploaded_file($_FILES["foto"]["tmp_name"],
                               "../uploads/" . $foto);
        } else {
            $foto = "";
        }

        // CADASTRO
        if ($erro == "") {

            $resultado = "";
            $detalhes = "";
    
            try {

                $sql = "INSERT INTO produtos(nome, preco, quantidade, foto)
                        VALUES (:nome, :preco, :quantidade, :foto)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':quantidade', $quantidade);
                $stmt->bindParam(':foto', $foto);

                $stmt->execute();

                $sucesso = "Produto cadastrado com sucesso!";
                $resultado = "SUCESSO";
                $idProduto = $conn->lastInsertId(); // pega o ID do produto cadastrado
                $detalhes = "Produto: " . $nome . " (ID: " . $idProduto . ")";

                // limpa formulário
                $nome = "";
                $preco = "";
                $quantidade = "";

            } catch (PDOException $e) {     

                $erro = "❌ Erro ao cadastrar produto. Tente novamente mais tarde."; //exibida no html
                $resultado = "ERRO";
                $detalhes = $e->getMessage();

            } finally {

                // AUDITORIA — executa sempre
                file_put_contents(
                    "../auditoria.log",
                    date("d/m/Y H:i:s") .
                    " - Cadastro de produto" .
                    " - Usuário ID: " . $_SESSION['id'] .
                    " - E-mail: " . $_SESSION['email'] .
                    " - Resultado: " . $resultado .
                    " - " . $detalhes .
                    PHP_EOL,
                    FILE_APPEND
                );

                // LOG DE ERRO — somente quando houve erro
                if ($resultado == "ERRO") {

                    file_put_contents(
                        "../erros.log",
                        date("d/m/Y H:i:s") .
                        " - Erro ao cadastrar produto" .
                        " - Usuário ID: " . $_SESSION['id'] .
                        " - E-mail: " . $_SESSION['email'] .                        
                        " - " . $detalhes .
                        PHP_EOL,
                        FILE_APPEND
                    );          

                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>➕ Cadastro de Produtos</h2>
    <hr>

    <form method="POST" enctype="multipart/form-data">
        Nome do produto:<br>
        <input type="text" name="nome" value="<?= $nome ?>">
        <br><br>

        Preço:<br>
        <input type="number" step="0.01" name="preco" value="<?= $preco ?>">
        <br><br>

        Quantidade:<br>
        <input type="number" name="quantidade" value="<?= $quantidade ?>">
        <br><br>

        Foto:<br>
        <input type="file" name="foto" accept="image/*">
        <br><br>

        <button type="submit">✅ Cadastrar</button>
    </form>
    <br>

    <?php
        if ($erro != "") {
            echo "<div style='color:red'>$erro</div>";
        }

        if ($sucesso != "") {
            echo "<div style='color:green'>$sucesso</div>";
        }
    ?>

    <hr>
    <a href="listar.php">🔎 Ver Produtos Cadastrados</a>

</body>
</html>