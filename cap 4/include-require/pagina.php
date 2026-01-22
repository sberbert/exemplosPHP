<?php
require 'header.php';

$nome = $_GET['nome'] ?? 'Visitante';
?>

<h2>Bem-vindo!</h2>
<p>Olá, <strong><?= $nome ?></strong></p>

<p>
    Este nome foi recebido via <code>$_GET</code>
    e exibido usando PHP no servidor.
</p>

<?php
include 'footer.php';


//http://localhost:8000/pagina.php?nome=Simone