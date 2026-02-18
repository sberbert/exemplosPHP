<h1>Calculadora de Idade (Interativo)</h1>

<form>
    <input type="date" name="nascimento">
    <button type="submit">Calcular</button>
</form>

<?php
    $nascimento = $_GET['nascimento'] ?? null;

    if ($nascimento) {

        $dataNasc = new DateTime($nascimento);
        $hoje = new DateTime();
        $idade = $dataNasc->diff($hoje);

        echo "<h3>Resultado:</h3>";
        echo "<p>Você tem {$idade->y} anos, {$idade->m} meses e {$idade->d} dias.</p>";
    }
?>