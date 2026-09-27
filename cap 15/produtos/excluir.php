<?php
    require "../autenticacao.php"; // Verifica se o usuário está autenticado
    require "../permissao.php"; // Verifica se o usuário tem permissão para acessar a página    
    require "../config.php";

    // Recebe ID
    $id = $_GET['id'];
    $resultado = "";
    $detalhes = "";
    $mensagem = "";

    try {

        // Busca a foto do produto
        $sql = "SELECT foto FROM produtos WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$produto) {
            $resultado = "ERRO";
            $detalhes = "Produto não encontrado";
            $mensagem = "❌ Produto não encontrado."; //não usar die, senão o finally não será executado

        } else { //else, produto encontrado - na versão anterior usavamos o die, então não tive o else

            // Exclui a imagem
            if ($produto["foto"] != "" && file_exists("../uploads/" . $produto["foto"])) {
                unlink("../uploads/" . $produto["foto"]);
            }    

            // Exclui produto
            $sql = "DELETE FROM produto WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $resultado = "SUCESSO";

            // Redireciona - agora no finally, para que a auditoria seja executada mesmo que haja erro
            //header("Location: listar.php?excluido=1");
            //exit;
        }

    } catch (PDOException $e) {
        $resultado = "ERRO";
        $detalhes = $e->getMessage();               
        $mensagem = "❌ Erro ao excluir produto. Tente novamente mais tarde."; //não usar die, senão o finally não será executado

    } finally {

        // AUDITORIA — executa sempre
        file_put_contents(
            "../auditoria.log",
            date("d/m/Y H:i:s") .
            " - Produto excluído: " . $id .
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
                " - Erro ao excluir o produto: " . $id .
                " - Usuário ID: " . $_SESSION['id'] .
                " - E-mail: " . $_SESSION['email'] .                        
                " - " . $detalhes .
                PHP_EOL,
                FILE_APPEND
            );    

        }
    
    }

    // Fora do finally: neste ponto, a auditoria já foi registrada.
    // Se deu certo, redireciona; se deu erro, mostra a mensagem.
    if ($resultado == "SUCESSO") {
        header("Location: listar.php?excluido=1");
        exit;
    }

    // Exibe mensagem se houve erro
    echo $mensagem;    
?>