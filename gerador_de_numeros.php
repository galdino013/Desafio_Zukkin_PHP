<?php

/*
Nome: Igor Galdino dos Santos
Email: igor.galdino@zuukin.com
Data: 02/04/2024
*/

// Define a quantidade de números gerados, 100 mil números, nesse caso.
$Qntd_numeros = 100000;

// Define o intervalo máximo para a geração de números aleatórios.
$min = 1000000000;
$max = 9999999999;

// Cria um array para armazenar os números únicos.
$unique_numbers = array();

// Gera e armazena números aleatórios únicos.
while (count($unique_numbers) < $Qntd_numeros) {
    $number = mt_rand($min, $max);
    $unique_numbers[$number] = true;
}

// Converte os números em uma string separada por quebras de linha.
$numbers_str = implode(PHP_EOL, array_keys($unique_numbers));

// Escreve a string de números no arquivo.
$filename = 'numeros_desordenados.txt';
file_put_contents($filename, $numbers_str);

// Verifica se o arquivo foi criado com sucesso e exibe a mensagem na tela do usuário.
if (file_exists($filename)) {
    echo "Arquivo gerado com sucesso: $filename";
    echo "<br> </br>";
} else {
    echo "Houve um erro ao criar o arquivo.";
}
?>
