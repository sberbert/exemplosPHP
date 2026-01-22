<?php

$ch = curl_init("https://dog.ceo/api/breeds/image/random");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*
Quando usamos APIs HTTPS no Windows, o PHP pode não conseguir validar o certificado SSL.
Nesse caso, o cURL retorna false.
Em ambiente de estudo, podemos desativar temporariamente a verificação SSL.
*/
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$resposta = curl_exec($ch);

if ($resposta === false) {
    echo "Erro no cURL: " . curl_error($ch);
    exit;
}

curl_close($ch);

$dados = json_decode($resposta, true);

echo "<img src='{$dados['message']}' width='300'>";
