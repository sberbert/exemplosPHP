<?php
    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página
    require "../config.php";

    // Recebe o ID enviado pela URL
    $id = $_GET['id'];

    // Busca produto
    $sql = "SELECT * FROM produtos WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Transforma em array associativo
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Atualização
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        
        //foto
        // Verifica se foi enviada uma nova foto
        if ($_FILES["foto"]["name"] != "") {

        echo "Nova foto enviada: " . $_FILES["foto"]["name"] . "<br>";

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

        echo "Nenhuma nova foto enviada. Mantendo a foto atual: " . $produto["foto"] . "<br>";
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

        /*$sql = "UPDATE produtos
                SET nome = :nome,
                    preco = :preco,
                    quantidade = :quantidade
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':id', $id);

        $stmt->execute();*/

        header("Location: listar.php?sucesso=1");
        exit;
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