<?php

// Define a quantidade de números gerados, 100 mil números, nesse caso.
$Qntd_numeros = 100000; 

// Abre o arquivo para escrita.
$filename = 'numeros.txt';
$file = fopen($filename, 'w');

// Gera e escreve números aleatórios de 10 dígitos no arquivo.
for ($i = 0; $i < $Qntd_numeros; $i++) {
    // Gera números aleatórios de 10 dígitos.
    $number = mt_rand(1000000000, 9999999999); 
    // Escreve os números no arquivo.
    fwrite($file, $number . PHP_EOL); 
}

// Fecha o arquivo.
fclose($file);

// Verifica se o arquivo foi criado com sucesso e exibe a mensagem na tela do usúario.
if (file_exists($filename)) {
    echo "Arquivo gerado com sucesso: $filename";
    echo "<br> </br>";
} else {
    echo "Houve um erro ao criar o arquivo.";
}
