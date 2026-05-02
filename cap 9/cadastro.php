<?php            
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    if (empty($produto) || empty($quantidade)) {
        echo "Preencha todos os campos";
    } else {
        echo "Produto: $produto";
        echo "<br>";
        echo "Quantidade: $quantidade";
    }
        
?>