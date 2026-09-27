<?php
    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página
    require "../config.php";

    // Recebe o ID enviado pela URL
    $id = $_GET['id'];

    //para log  
    $resultado = "";
    $detalhes = "";
    $mensagem = "";

    try {

    // Busca produto
    $sql = "SELECT * FROM produtos WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Transforma em array associativo
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Atualização
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        
        //foto
        // Verifica se foi enviada uma nova foto
        if ($_FILES["foto"]["name"] != "") {

            // Exclui a foto antiga
            if ( $produto["foto"] != "" && file_exists("../uploads/" . $produto["foto"]) ) {
                unlink("../uploads/" . $produto["foto"]);
            }
            $extensao = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION); // Extensão da nova imagem

            $foto = uniqid() . "." . $extensao; //Novo nome p/ foto com base no timestamp atual

            // Move para uploads
            move_uploaded_file( $_FILES["foto"]["tmp_name"], "../uploads/" . $foto);

            // Atualiza incluindo a foto
            $sql = "UPDATE produtos
                    SET nome = :nome,
                        preco = :preco,
                        quantidade = :quantidade,
                        foto = :foto
                    WHERE id = :id";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':foto', $foto);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

        } else {

            // Mantém a foto atual
            $sql = "UPDATE produtos
                    SET nome = :nome,
                        preco = :preco,
                        quantidade = :quantidade
                    WHERE id = :id";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        }        

        //para log
        $resultado = "SUCESSO";

        //header("Location: listar.php?sucesso=1");
        //exit;
    }

    } catch (PDOException $e) {
        $resultado = "ERRO";

        // Detalhe técnico vai para o log
        $detalhes = $e->getMessage();

        // Mensagem amigável para o usuário
        $mensagem = "❌ Erro ao editar produto. Tente novamente mais tarde.";
    }  finally {

        // AUDITORIA — executa sempre
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            file_put_contents(
                "../auditoria.log",
                date("d/m/Y H:i:s") .
                " - Tentativa de edição do produto: " . $id .
                " - Usuário ID: " . $_SESSION['id'] .
                " - E-mail: " . $_SESSION['email'] .
                " - Resultado: " . $resultado .
                PHP_EOL,
                FILE_APPEND
            );

            // LOG DE ERRO — somente quando houve erro
            if ($resultado == "ERRO") {

                file_put_contents(
                    "../erros.log",
                    date("d/m/Y H:i:s") .
                    " - Erro ao editar o produto: " . $id .
                    " - Usuário ID: " . $_SESSION['id'] .
                    " - E-mail: " . $_SESSION['email'] .
                    " - " . $detalhes .
                    PHP_EOL,
                    FILE_APPEND
                );
            }
        }
    }  

    // Redireciona somente se a edição deu certo
    if ($resultado == "SUCESSO") {
        header("Location: listar.php?sucesso=1");
        exit;
    }

    // Exibe mensagem se houve erro
    if ($mensagem != "") {
        echo $mensagem;
    }    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
  </head>
<body>

    <h1>✏️ Editar Produto</h1>
    <hr>

    <form method="POST" enctype="multipart/form-data">
        Nome:<br>
        <input
            type="text"
            name="nome"
            placeholder="Nome"
            value="<?= $produto['nome'] ?>"
        >
        <br><br>

        Preço:<br>
        <input
            type="number"
            step="0.01"
            name="preco"
            placeholder="Preço"
            value="<?= $produto['preco'] ?>"
        >
        <br><br>

        Quantidade:<br>
        <input
            type="number"
            name="quantidade"
            placeholder="Quantidade"
            value="<?= $produto['quantidade'] ?>"
        >
        <br><br>

        Foto atual:<br>

        <?php if ($produto["foto"] != "") { ?>
        <img
            src="../uploads/<?= htmlspecialchars($produto["foto"]) ?>"
            width="120" alt="Foto atual">
        <?php } else { ?>
            Sem imagem
        <?php } ?>

        <br><br>
        Nova foto:<br>
        <input type="file" name="foto" accept="image/*">        
        <br><br>

        <button type="submit">
            ✔  Salvar Alterações
        </button>

        <button type="button" onclick="window.location.href='listar.php'">
            ❌Cancelar
        </button>        

    </form>

</body>
</html>