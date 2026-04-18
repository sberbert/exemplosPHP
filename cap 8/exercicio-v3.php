<?php

//versão com checkbox e select
$erro = "";
$resultado = "";

// valores padrão (evita erro no primeiro carregamento)
$nome = "";
$preco = "";
$quantidade = "";
$frete = "";
$categoria = "";

$categorias = ["Eletrônico", "Alimento", "Vestuário"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = trim($_POST['nome']);
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $frete = isset($_POST['frete']) ? "Sim" : "Não";
    $categoria = $_POST['categoria'];

    // VALIDAÇÃO
    if (empty($nome)) {
        $erro .= "Nome do produto é obrigatório<br>";
    }

    if (empty($preco) || $preco <= 0) {
        $erro .= "Preço deve ser maior que zero<br>";
    }

    if (empty($quantidade) || $quantidade <= 0) {
        $erro .= "Quantidade deve ser maior que zero<br>";
    }

    if (empty($categoria)) {
        $erro .= "Selecione uma categoria<br>";
    }    

    // PROCESSAMENTO
    if ($erro == "") {

        $total = $preco * $quantidade;

        if ($frete == "Sim") {
            $total += 10; // taxa fixa de frete
        }            

        // formatação
        $totalFormatado = number_format($total, 2, ',', '.');

        $resultado = "
            <h3>Cadastro realizado!</h3>
            <b>Produto:</b> $nome <br>
            <b>Preço:</b> R$ " . number_format($preco, 2, ',', '.') . " <br>
            <b>Quantidade:</b> $quantidade <br>
            <b>Frete:</b> $frete <br>
            <b>Categoria:</b> $categoria <br>
            <hr>
            <b>Total: R$ $totalFormatado</b>
        ";

        // limpa os campos após sucesso
        $nome = "";
        $preco = "";
        $quantidade = "";   
        $frete = "";     
        $categoria = "";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produto</title>
</head>
<body>

<h2>Cadastro de Produto</h2>

<hr>

<form method="POST">

    Nome do produto:<br>
    <input type="text" name="nome" value="<?= $nome ?>"><br><br>

    Preço unitário:<br>
    <input type="number" step="0.01" name="preco" value="<?= $preco ?>"><br><br>

    Quantidade:<br>
    <input type="number" name="quantidade" value="<?= $quantidade ?>"><br><br>

    Categoria:<br>
    <select name="categoria">
        <option value="">Selecione</option>

        <?php
            //não mantém a categoria caso ocorra erro
            /*foreach ($categorias as $cat) {
                echo "<option value='$cat'>$cat</option>";
            }*/

            //mantém a categoria caso ocorra erro            
            foreach ($categorias as $cat) {
                $selected = ($categoria == $cat) ? "selected" : "";
                echo "<option value='$cat' $selected>$cat</option>";
            }
        ?>
    </select><br><br>    

    <input type="checkbox" name="frete" <?= ($frete == "Sim") ? "checked" : "" ?>>
     Adicionar frete (+ R$10)
     <br><br>    

    <button type="submit">Cadastrar</button>

</form>

<br>

<?php
    if ($erro != "") {
        echo "<div style='color:red'>$erro</div>";
    }

    echo $resultado;
?>

</body>
</html>