<?php
//Consumindo no PHP com cURL (padrão de mercado)
//usar o servidor interno do PHP em outra porta (que não seja a mesma onde esteja rodando a API, ex porta 8001)

$ch = curl_init('http://localhost:8000/exemploAPI.php');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($ch);
curl_close($ch);

$dados = json_decode($resposta, true);

echo "Usuário: " . $dados['nome'] . "<br>";
echo "Perfil: " . $dados['perfil'];