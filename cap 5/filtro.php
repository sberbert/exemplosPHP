<?php
    $usuarios = [
        ["nome" => "Ana", "perfil" => "Admin"],
        ["nome" => "Carlos", "perfil" => "User"],
        ["nome" => "Marina", "perfil" => "Admin"]
    ];

    $filtro = $_GET['perfil'] ?? null;

    /*
    array_filter percorre o array e:
    Executa a função para cada item
    Mantém o item se a função retornar true
    Remove se retornar false
    É como um “peneirador” de dados.
    */

    if ($filtro) {
        $usuarios = array_filter($usuarios, function($u) use ($filtro) {
            return $u['perfil'] === $filtro;
        });
    }
?>

<form>
    <select name="perfil">
        <option value="">Todos</option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
    </select>
    <button>Filtrar</button>
</form>

<?php foreach ($usuarios as $u): ?>
    <p><?= $u['nome'] ?> - <?= $u['perfil'] ?></p>
<?php endforeach; ?>